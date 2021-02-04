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
                    <a class="nav-link" id="edit-peminjaman-list" data-toggle="list" href="#edit-peminjaman" role="tab" aria-controls="profile">Booking Barang</a>
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
                                            <select name="katbrginput" id="kategoribarangId" class="form-control">
                                                <option value="" selected>Pilih kategori Barang</option>
                                                <?php foreach ($kategoriDatas as $key => $kat) {
                                                    echo "<option value=" . $kat->id_katagori . " >" . $kat->nama_katagori . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Nama Barang</label>
                                            <select name="namabrginput" id="namabarangId" class="form-control">
                                                <option value="" selected>Pilih Katagori barang terlebih dahulu</option>
                                            </select>
                                        </div>
                                        <fieldset disabled>
                                            <div class="form-group">
                                                <label for="">Stok yang tersedia</label>
                                                <input type="text" id="disabledTextInput" class="form-control avaiableStock" placeholder="Disabled input">
                                            </div>
                                        </fieldset>
                                        <div class="form-group">
                                            <label for="jumlahbarangId">Jumlah Barang</label>
                                            <input name="jmlbrginput" type="number" class="form-control" id="jumlahbarangId" placeholder="Jumlah Barang">
                                        </div>
                                        <button type="button" id="tambahBarangBtn" class="btn btn-primary float-right" name="inputbrg"><i class="fa fa-keyboard" style="margin-right: 10px;" aria-hidden="true"></i>Input Barang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card mb-4">
                                <div class="card-header"><i class="fa fa-table" style="margin-right: 10px;" aria-hidden="true"></i>
                                    Data Peminjaman
                                </div>
                                <form action="<?= base_url("peminjaman/pinjam") ?>" method="post">
                                    <div class="card-body">
                                        <div class="table-responsive-xl">
                                            <table id="" class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Barang</th>
                                                        <th scope="col">Kategori Barang</th>
                                                        <th scope="col">Jumlah</th>
                                                        <th scope="col">Kondisi Barang</th>
                                                        <th scope="col">Aksi</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="detail_cart">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-sm">
                                                <label>Nama Tempat</label>
                                                <input type="text" name="namatempattxt" class="form-control" id="namaPeminjam" placeholder="Nama tempat">
                                                <small id="helpId" class="text-danger"><?= form_error("namatempattxt") ?></small>
                                            </div>
                                            <div class="col-sm">
                                                <label>Nama Peminjam</label>
                                                <input type="text" name="namapeminjamtxt" class="form-control" id="namaPeminjam" placeholder="Nama peminjam">
                                                <small id="helpId" class="text-danger"><?= form_error("namapeminjamtxt") ?></small>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-sm ">
                                                <label>Tanggal Pengambilan</label>
                                                <input type="date" name="tglambiltxt" class="form-control" id="">
                                                <small id="helpId" class="text-danger"><?= form_error("tglambiltxt") ?></small>
                                            </div>
                                            <div class="col-sm">
                                                <label>Tanggal Pengembalian</label>
                                                <input type="date" name="tglkembalitxt" class="form-control" id="">
                                                <small id="helpId" class="text-danger"><?= form_error("tglkembalitxt") ?></small>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <br>
                                        <button id="pinjamsubmit" class="btn btn-success btn-block">Proses</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="edit-peminjaman" role="tabpanel" aria-labelledby="edit-peminjaman-list">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card mb-4">
                                <div class="card-header"><i class="fab fa-dropbox" style="margin-right: 10px;" aria-hidden="true"></i>
                                    Isi data booking barang
                                </div>
                                <div class="card-body">
                                    <form method="POST" name="datapinjaman" action="">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Kategori Barang</label>
                                            <select name="katbrginput" id="kategoribarangId" class="form-control">
                                                <option value="" selected>Pilih kategori Barang</option>
                                                <?php foreach ($kategoriDatas as $key => $kat) {
                                                    echo "<option value=" . $kat->id_katagori . " >" . $kat->nama_katagori . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Nama Barang</label>
                                            <select name="namabrginput" id="namabarangId" class="form-control">
                                                <option value="" selected>Pilih Katagori barang terlebih dahulu</option>
                                            </select>
                                        </div>
                                        <fieldset disabled>
                                            <div class="form-group">
                                                <label for="">Stok yang tersedia</label>
                                                <input type="text" id="disabledTextInput" class="form-control avaiableStock" placeholder="Disabled input">
                                            </div>
                                        </fieldset>
                                        <div class="form-group">
                                            <label for="jumlahbarangId">Jumlah Barang</label>
                                            <input name="jmlbrginput" type="number" class="form-control" id="jumlahbarangId" placeholder="Jumlah Barang">
                                        </div>
                                        <button type="button" id="tambahBarangBtn" class="btn btn-primary float-right" name="inputbrg"><i class="fa fa-keyboard" style="margin-right: 10px;" aria-hidden="true"></i>Input Barang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card mb-4">
                                <div class="card-header"><i class="fa fa-table" style="margin-right: 10px;" aria-hidden="true"></i>
                                    Data Peminjaman
                                </div>
                                <form action="#" method="post">
                                    <div class="card-body">
                                        <div class="table-responsive-xl">
                                            <table id="" class="table table-bordered">
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
                                                <tbody id="detail_cart">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-sm">
                                                <label>Nama Tempat</label>
                                                <input type="text" name="namatempattxt" class="form-control" id="namaPeminjam" placeholder="Nama tempat">
                                                <small id="helpId" class="text-danger"><?= form_error("namatempattxt") ?></small>
                                            </div>
                                            <div class="col-sm">
                                                <label>Nama Peminjam</label>
                                                <input type="text" name="namapeminjamtxt" class="form-control" id="namaPeminjam" placeholder="Nama peminjam">
                                                <small id="helpId" class="text-danger"><?= form_error("namapeminjamtxt") ?></small>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-sm ">
                                                <label>Tanggal Pengambilan</label>
                                                <input type="date" name="tglambiltxt" class="form-control" id="">
                                                <small id="helpId" class="text-danger"><?= form_error("tglambiltxt") ?></small>
                                            </div>
                                            <div class="col-sm">
                                                <label>Tanggal Pengembalian</label>
                                                <input type="date" name="tglkembalitxt" class="form-control" id="">
                                                <small id="helpId" class="text-danger"><?= form_error("tglkembalitxt") ?></small>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <br>
                                        <button id="pinjamsubmit" class="btn btn-success btn-block">Proses</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->