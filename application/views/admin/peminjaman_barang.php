`
<!-- Content -->
<div class="container-fluid">
    <h2>Peminjaman Barang</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Peminjaman Barang</li>
    </ol>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="peminjaman-barang-list" data-toggle="list" href="#peminjaman-barang" role="tab" aria-controls="home">Peminjaman Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="edit-peminjaman-list" data-toggle="list" href="#edit-peminjaman" role="tab" aria-controls="profile">Edit Peminjaman Barang</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="peminjaman-barang" role="tabpanel" aria-labelledby="peminjaman-barang-list">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card mb-4">
                                <div class="card-header"><i class="fab fa-dropbox" style="margin-right: 10px;" aria-hidden="true"></i>
                                    Isi data peminjaman barang
                                </div>
                                <div class="card-body">
                                    <form method="POST" name="datapinjaman" action="">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Kategori Barang</label>
                                            <select name="katbrginput" id="inputState" class="form-control">
                                                <option selected>Pilih kategori Barang</option>
                                                <?php foreach ($kategoriDatas as $key => $kat) {
                                                    echo "<option value=" . $kat->nama_katagori . " >" . $kat->nama_katagori . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Nama Barang</label>
                                            <select name="namabrginput" id="inputState" class="form-control">
                                                <option selected>Pilih Barang</option>
                                                <?php foreach ($barangDatas as $key => $value) { ?>
                                                    <option value="<?= $value->nama_barang ?>"><?= $value->nama_barang ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Jumlah Barang</label>
                                            <input name="jmlbrginput" type="number" class="form-control" id="formGroupExampleInput2" placeholder="Jumlah Barang">
                                        </div>
                                        <button class="btn btn-primary float-right" name="inputbrg"><i class="fa fa-keyboard" style="margin-right: 10px;" aria-hidden="true"></i>Input Barang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card mb-4">
                                <div class="card-header"><i class="fa fa-table" style="margin-right: 10px;" aria-hidden="true"></i>
                                    Data Peminjaman
                                </div>
                                <form action="" method="post">
                                    <div class="card-body">
                                        <div class="alert alert-success" role="alert">
                                            <strong>Meja</strong> hanya tersisa <strong>69</strong>
                                        </div>
                                        <div class="table-responsive-xl">
                                            <table id="" class="table table-bordered">
                                                <?php
                                                $kat = "";
                                                $kat = isset($_POST['katbrginput']) ? $_POST['katbrginput'] : '';
                                                $nama = "";
                                                $nama = isset($_POST['namabrginput']) ? $_POST['namabrginput'] : '';
                                                $jml = 0;
                                                $jml = isset($_POST['jmlbrginput']) ? $_POST['jmlbrginput'] : '';
                                                ?>
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Barang</th>
                                                        <th scope="col">Kategori Barang</th>
                                                        <th scope="col">Jumlah Barang</th>
                                                        <th scope="col">Kondisi Barang</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (isset($_SESSION["temp"])) {
                                                        $datas = array($_SESSION["temp"]);
                                                        array_push(
                                                            $datas,
                                                            array(
                                                                'nama' => $nama,
                                                                'kat' => $kat,
                                                                'jml' => $jml
                                                            )
                                                        );
                                                        $this->session->set_flashdata("temp", $datas);
                                                    } else {
                                                        $datas = array();
                                                        array_push(
                                                            $datas,
                                                            array(
                                                                'nama' => $nama,
                                                                'kat' => $kat,
                                                                'jml' => $jml
                                                            )
                                                        );
                                                        $this->session->set_flashdata("temp", $datas);
                                                    }
                                                    print_r($datas);
                                                    ?>
                                                    <?php foreach($datas as $key => $value){ ?>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>
                                                            <?php if ($nama == null) {
                                                                echo "Pilih nama barang";
                                                            } else {
                                                                echo "$nama";
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($kat == null) {
                                                                echo "Pilih kategori barang";
                                                            } else {
                                                                echo "$kat";
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($jml == 0) {
                                                                echo "Isi jumlah barang";
                                                            } else {
                                                                echo "$jml";
                                                            } ?>
                                                        </td>
                                                        <td>Baik</td>
                                                        <td>
                                                            <button class="btn btn-warning"><i class="fa fa-pencil" style="margin-right: 10px;" aria-hidden="true"></i>Edit</button>
                                                            <button class="btn btn-danger"><i class="fa fa-trash" style="margin-right: 10px;" aria-hidden="true"></i>Hapus</button>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                                <label>Nama Tempat</label>
                                                <input type="text" class="form-control" id="namaPeminjam" placeholder="Nama tempat">
                                            </div>
                                            <div class="col-sm">
                                                <label>Nama Peminjam</label>
                                                <input type="text" class="form-control" id="namaPeminjam" placeholder="Nama peminjam">
                                            </div>
                                            <div class="col-sm ">
                                                <label>Tanggal Pengambilan</label>
                                                <input type="date" class="form-control" name="" id="">
                                            </div>
                                            <div class="col-sm">
                                                <label>Tanggal Pengembalian</label>
                                                <input type="date" class="form-control" name="" id="">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <br>
                                        <button class="btn btn-success btn-block">Proses</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="edit-peminjaman" role="tabpanel" aria-labelledby="edit-peminjaman-list">
                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header"><i class="fa fa-list" style="margin-right: 10px;" aria-hidden="true"></i>
                                List Barang
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No ID</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Jumlah Barang</th>
                                            <th scope="col">Kondisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Meja</td>
                                            <td>20 Buah</td>
                                            <td>Baik</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->`