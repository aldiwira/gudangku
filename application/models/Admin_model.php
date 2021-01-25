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
        $this->db->group_by("barang.kondisi_barang");
        $this->db->group_by("barang.status_barang");
        $this->db->group_by("barang.nama_barang");
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
            if ($checkKeluar !== null) {
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
                $datas = array(
                    "kode_barang" => $kode_barang_baru,
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
                $detail = array("id_detail_catatan" => $value["id"], "id_barang" => $kode_barang_baru, "id_catatan" => $id_catatan, "jumlah" => $value["qty"]);
                $this->cruder->create("detail_catatan", $detail);
            }
        }
        return true;
    }
}

/* End of file Admin.php */
