<!-- Content -->
<div class="container-fluid">
    <h2>Pengembalian Barang</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengembalian Barang</li>
    </ol>
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header"><i class="fa fa-table" style="margin-right: 10px;" aria-hidden="true"></i>
                    Data Barang
                </div>
                <div class="card-body">
                    <div class="table-responsive-xl">
                        <table id="listBarang" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No Id</th>
                                    <th scope="col">Nama Tempat</th>
                                    <th scope="col">Nama Peminjam</th>
                                    <th scope="col">Tanggal Kembali</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($record as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $value->nama_catatan ?></td>
                                        <td><?= $value->penanggung ?></td>
                                        <td><?= $value->tanggal_kembali ?></td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-reply" style="margin-right: 10px;" aria-hidden="true"></i>Pengembalian</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <div class="modal-title">
                                    <label>Pengembalian barang</label>
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label>Nama Peminjam: "Nama"</label>
                                <form action="" method="post">
                                    <div class="table-responsive-xl">
                                        <table id="dataPinjam" class="table table-bordered">
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
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Meja</td>
                                                    <td>Furnitur</td>
                                                    <td>1 Buah</td>
                                                    <td>
                                                        <select id="inputState" class="form-control">
                                                            <option selected>Pilih kondisi Barang</option>
                                                            <option>Normal</option>
                                                            <option>Rusak</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-warning"><i class="fa fa-pencil" style="margin-right: 10px;" aria-hidden="true"></i>Edit</button>
                                                        <button class="btn btn-danger"><i class="fa fa-trash" style="margin-right: 10px;" aria-hidden="true"></i>Hapus</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Kursi</td>
                                                    <td>Furnitur</td>
                                                    <td>1 Buah</td>
                                                    <td>
                                                        <select id="inputState" class="form-control">
                                                            <option selected>Pilih kondisi Barang</option>
                                                            <option>Normal</option>
                                                            <option>Rusak</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-warning"><i class="fa fa-pencil" style="margin-right: 10px;" aria-hidden="true"></i>Edit</button>
                                                        <button class="btn btn-danger"><i class="fa fa-trash" style="margin-right: 10px;" aria-hidden="true"></i>Hapus</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                <button type="button" class="btn btn-success">Selesai</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->