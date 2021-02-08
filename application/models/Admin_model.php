<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Cruder_Model', 'cruder');
        $this->load->helper('Varrand');
        $this->load->library('cart');
    }

    public function getKategori()
    {
        return $this->cruder->get('kategori')->result();
    }
    public function getBarang()
    {
        $this->db->select("barang.kode_barang, barang.nama_barang, kategori.nama_katagori, barang.jumlah_barang, barang.status_barang, barang.kondisi_barang");
        $this->db->select_sum("barang.jumlah_barang");
        $this->db->group_by(array("barang.kondisi_barang", "barang.status_barang", "barang.nama_barang"));
        $this->db->where("barang.status_barang", "ada");
        $this->db->from("barang");
        $this->db->join("kategori", "kategori.id_katagori = barang.id_katagori");
        $datas = $this->db->get()->result();
        return $datas;
    }
    public function addBarang()
    {
        $datas = array(
            "kode_barang" => randomId(10),
            "nama_barang" => $this->input->post('namabarangtxt'),
            "jumlah_barang" => $this->input->post('jumlahbarangtxt'),
            "kondisi_barang" => $this->input->post('kondisibarang'),
            "id_katagori" => $this->input->post('katagoribarang')
        );
        $checker = $this->cruder->whereLikeCondition(
            "barang",
            array("nama_barang" => $datas["nama_barang"]),
            array("kondisi_barang" => $datas["kondisi_barang"], "status_barang" => "ada", "id_katagori" => $datas["id_katagori"])
        )->row();

        if ($checker != null) {
            $this->cruder->update(
                "barang",
                array("kode_barang" => $checker->kode_barang, "id_katagori" => $datas["id_katagori"]),
                array("jumlah_barang" => $checker->jumlah_barang + $datas["jumlah_barang"])
            );
            return true;
        } else {
            $this->cruder->create('barang', $datas);
            return true;
        }
    }
    public function changePassword($datas)
    {
        $userID =  get_cookie('SID');
        $this->cruder->update("pengguna", array("id_pengguna" => $userID), $datas);
        return true;
    }
    public function addRecord()
    {
        $id_catatan = randomId(10);
        $kode_barang_baru = randomId(10);
        // masukkan data pada catatan
        $catatan = array(
            "id_catatan" => $id_catatan,
            "nama_catatan" => $this->input->post('namatempattxt'),
            "penanggung" => $this->input->post('namapeminjamtxt'),
            "id_pengguna" => get_cookie("SID"),
            "tipe_catatan" => "keluar",
            "tanggal_ambil" => $this->input->post('tglambiltxt'),
            "tanggal_kembali" => $this->input->post('tglkembalitxt'),
        );
        $this->cruder->create("catatan", $catatan);

        // masukkan data pada detail catatan
        $record = $this->cart->contents();
        foreach ($record as $key => $value) {
            // Pertama check barang yang sama dengan status keluar
            $check = $this->cruder->where("barang", array("kode_barang" => $value["name"]))->row();
            $checkKeluar = $this->cruder->where("barang", array("nama_barang" => $check->nama_barang, "status_barang" => "keluar"))->row();
            if ($checkKeluar != null) {
                // Kedua jika ada maka update ID tersebut
                $updateJumlah = $value["qty"] + $checkKeluar->jumlah_barang;
                $this->cruder->update(
                    "barang",
                    array(
                        "kode_barang" => $checkKeluar->kode_barang,
                        "status_barang" => "keluar"
                    ),
                    array(
                        "jumlah_barang" => $updateJumlah,
                        "updatedAt" => getDateNow()
                    )
                );
                // update jumlah yang ada
                $this->cruder->update(
                    "barang",
                    array(
                        "kode_barang" => $check->kode_barang,
                        "status_barang" => "ada"
                    ),
                    array(
                        "jumlah_barang" => $check->jumlah_barang - $value["qty"],
                        "updatedAt" => getDateNow()
                    )
                );
                // Insert ke detail catatan
                $detail = array("id_detail_catatan" => $value["id"], "id_barang" => $checkKeluar->kode_barang, "id_catatan" => $id_catatan, "jumlah" => $value["qty"]);
                $this->cruder->create("detail_catatan", $detail);
            } else {
                // Kedua Jika tidak ada maka insert baru
                $kdesdas = randomId(10);
                $datas = array(
                    "kode_barang" => $kdesdas,
                    "nama_barang" => $check->nama_barang,
                    "jumlah_barang" => $value["qty"],
                    "id_katagori" => $check->id_katagori,
                    "status_barang" => "keluar",
                    "kondisi_barang" => $check->kondisi_barang
                );
                $this->cruder->create("barang", $datas);
                $this->cruder->update(
                    "barang",
                    array(
                        "kode_barang" => $check->kode_barang,
                        "status_barang" => "ada"
                    ),
                    array(
                        "jumlah_barang" => $check->jumlah_barang - $value["qty"],
                        "updatedAt" => getDateNow()
                    )
                );
                // Insert ke detail catatan
                $detail = array("id_detail_catatan" => $value["id"], "id_barang" => $kdesdas, "id_catatan" => $id_catatan, "jumlah" => $value["qty"]);
                $this->cruder->create("detail_catatan", $detail);
            }
        }
        return true;
    }

    // start peminjaman barang
    public function getPinjaman($id = 0)
    {

        $this->db->select("catatan.id_catatan, detail_catatan.id_detail_catatan, catatan.nama_catatan, catatan.penanggung, pengguna.username, catatan.tanggal_kembali");
        $this->db->group_by("catatan.id_catatan");
        $this->db->join("detail_catatan", "detail_catatan.id_catatan = catatan.id_catatan", "inner");
        $this->db->join("barang", "barang.kode_barang = detail_catatan.id_barang");
        $this->db->join("pengguna", "pengguna.id_pengguna = catatan.id_pengguna");
        $this->db->where(array("tipe_catatan" => "keluar"));
        if ($id != 0) {

            $this->db->where(array("id_detail_catatan" => $id));
        }
        $this->db->from("catatan");
        if ($id !== 0) {
            $data = $this->db->get()->row();
        } else {
            $this->db->order_by("catatan.tanggal_kembali", "DSC");
            $data = $this->db->get()->result();
        }
        return $data;
    }
    public function getBarangPinjam($id = 0)
    {
        $this->db->where(array("detail_catatan.id_catatan" => $id));
        $this->db->join('barang', 'barang.kode_barang = detail_catatan.id_barang');
        $this->db->join('kategori', 'kategori.id_katagori = barang.id_katagori');
        $this->db->join('catatan', 'catatan.id_catatan = detail_catatan.id_catatan');
        $this->db->from("detail_catatan");
        $data = $this->db->get()->result();
        return $data;
    }

    private function changeBarang($status, $data)
    {
        $idBaru = randomId(10);
        $filter = array(
            "nama_barang" => $data["nama_barang"],
            "id_katagori" => $this->cruder->whereLike("kategori", array("nama_katagori" => $data["kategori_barang"]))->row()->id_katagori,
            "status_barang" => "ada",
            "kondisi_barang" => $status
        );
        $checkBarangNormal = $this->cruder->where("barang", $filter)->row();


        if ($checkBarangNormal == null) {
            if ($status === "normal") {
                $newData = array(
                    "kode_barang" => $idBaru,
                    "id_katagori" => $filter["id_katagori"],
                    "nama_barang" => $data["nama_barang"],
                    "jumlah_barang" => $data["jumlah_normal"],
                    "kondisi_barang" => "normal"
                );
            } else if ($status === "rusak") {
                $newData = array(
                    "kode_barang" => $idBaru,
                    "id_katagori" => $filter["id_katagori"],
                    "nama_barang" => $data["nama_barang"],
                    "jumlah_barang" => $data["jumlah_rusak"],
                    "kondisi_barang" => "rusak"
                );
            }
            // // insert data
            $this->cruder->create("barang", $newData);
            return $idBaru;
        } else {
            if ($status === "normal") {
                $update = array(
                    "jumlah_barang" => (int)$checkBarangNormal->jumlah_barang + (int)$data["jumlah_normal"],
                    "updatedAt" => getDateNow()
                );
            } else if ($status === "rusak") {
                $update = array(
                    "jumlah_barang" => (int)$checkBarangNormal->jumlah_barang + (int)$data["jumlah_rusak"],
                    "updatedAt" => getDateNow()
                );
            }
            $this->cruder->update("barang", $filter, $update);
            return $checkBarangNormal->kode_barang;
        }
    }

    private function updateBarangOdd($data)
    {
        $fil = array("kode_barang" => $data["kode_barang"], "status_barang" => "keluar");
        $check = $this->cruder->where("barang", $fil)->row();

        if ($check !== null) {
            $upd = array("jumlah_barang" => (int)$check->jumlah_barang - (int)$data["jumlah_barang"]);
            $this->cruder->update("barang", $fil, $upd);
        }
    }

    private function updateCatatan($status, $detail_catatan, $id_barang, $datas = null)
    {
        if ($status === "both") {
            // delete first than insert
            $this->cruder->remove("detail_catatan", array("id_catatan" => $detail_catatan->id_catatan, "id_barang" => $detail_catatan->id_barang));
            $dta = $datas;
            if ($dta["kondisi_barang_normal"] == "true") {
                # code...
                $data = array("id_detail_catatan" => randomId(10), "id_catatan" => $detail_catatan->id_catatan, "id_barang" => $id_barang["normal"], "jumlah" => $dta["jumlah_normal"]);
                $this->cruder->create("detail_catatan", $data);
            }
            if ($dta["kondisi_barang_rusak"] == "true") {
                # code...
                $data = array("id_detail_catatan" => randomId(10), "id_catatan" => $detail_catatan->id_catatan, "id_barang" => $id_barang["rusak"], "jumlah" => $dta["jumlah_rusak"]);
                $this->cruder->create("detail_catatan", $data);
            }
        } else if ($status === "normal") {
            $filter = array("id_catatan" => $detail_catatan->id_catatan, "id_barang" => $detail_catatan->id_barang);
            $update = array("id_barang" => $id_barang, "createdAt" => getDateNow());
            $this->cruder->update("detail_catatan", $filter, $update);
        } else if ($status === "rusak") {
            $filter = array("id_catatan" => $detail_catatan->id_catatan, "id_barang" => $detail_catatan->id_barang);
            $update = array("id_barang" => $id_barang, "createdAt" => getDateNow());
            $this->cruder->update("detail_catatan", $filter, $update);
        }

        $filter2 = array("id_catatan" => $detail_catatan->id_catatan);
        $update2 = array("tipe_catatan" => "masuk", "createdAt" => getDateNow());
        $this->cruder->update("catatan", $filter2, $update2);
    }

    public function doneBarangPinjam($id = 0, $datas = null)
    {
        // mengecheck detail barang
        $detail = $this->getBarangPinjam($id);
        foreach ($detail as $key => $value) {
            // check id barang dari detail barang
            $data = $datas[$key];
            if ($data["kondisi_barang_normal"] == "true" && $data["kondisi_barang_rusak"] == "true") {
                $one = $this->changeBarang("normal", $data);
                $two = $this->changeBarang("rusak", $data);
                $this->updateBarangOdd($data);
                $this->updateCatatan("both", $value, array("normal" => $one, "rusak" =>  $two), $data);
            } else if ($data["kondisi_barang_normal"] == "true") {

                $idCatatan = $this->changeBarang("normal", $data);
                $this->updateBarangOdd($data);
                $this->updateCatatan("normal", $value, $idCatatan);
            } else if ($data["kondisi_barang_rusak"] == "true") {

                $idCatatann = $this->changeBarang("rusak", $data);
                $this->updateBarangOdd($data);
                $this->updateCatatan("rusak", $value, $idCatatann);
            }
        }
        return true;
    }
    // end peminjaman barang
}

/* End of file Admin.php */
