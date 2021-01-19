<!-- Content -->
<div class="container-fluid">
    <h2>Peminjaman Barang</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Peminjaman Barang</li>
    </ol>
    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4">
                <div class="card-header"><i class="fa fa-user" style="margin-right: 10px;" aria-hidden="true"></i>
                    Petugas: User1
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Barang</label>
                            <select id="inputState" class="form-control">
                                <option selected>Pilih Barang</option>
                                <option>Ngantuk Slur</option>
                                <option>Moleh gak a?</option>
                                <option>Ngopi gak a?</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jumlah Barang</label>
                            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Jumlah Barang">
                        </div>
                        <button class="btn btn-primary float-right"><i class="fa fa-keyboard" style="margin-right: 10px;" aria-hidden="true"></i>Input Barang</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header"><i class="fa fa-table" style="margin-right: 10px;" aria-hidden="true"></i>
                    Data Peminjaman
                </div>
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        <strong>Meja</strong> hanya tersisa <strong>69</strong>
                    </div>
                    <table id="dataPinjam" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Kondisi Barang</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Meja</td>
                                <td>1</td>
                                <td>Baik</td>
                                <td>
                                    <button class="btn btn-warning"><i class="fa fa-pencil" style="margin-right: 10px;" aria-hidden="true"></i>Edit</button>
                                    <button class="btn btn-danger"><i class="fa fa-trash" style="margin-right: 10px;" aria-hidden="true"></i>Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Kursi</td>
                                <td>1</td>
                                <td>Baik</td>
                                <td>
                                    <button class="btn btn-warning"><i class="fa fa-pencil" style="margin-right: 10px;" aria-hidden="true"></i>Edit</button>
                                    <button class="btn btn-danger"><i class="fa fa-trash" style="margin-right: 10px;" aria-hidden="true"></i>Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm ">
                            <label>Tanggal Pengambilan</label>
                            <input type="date" class="form-control" name="" id="">
                        </div>
                        <div class="col-sm">
                            <label>Tanggal Pengembalian</label>
                            <input type="date" class="form-control" name="" id="">
                        </div>
                        <div class="col-sm">
                            <label>Nama Peminjam</label>
                            <input type="text" class="form-control" id="namaPeminjam" placeholder="Nama peminjam">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <br>
                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#pinjamBarang">Proses</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="pinjamBarang" tabindex="-1" aria-labelledby="pinjamBarang" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pinjamBarang">Review barang yang akan dipinjamkan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label>Nama Peminjam: Mark</label>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Jumlah Barang</th>
                                            <th scope="col">Kondisi Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Meja</td>
                                            <td>1</td>
                                            <td>Baik</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Kursi</td>
                                            <td>1</td>
                                            <td>Baik</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                <button type="button" class="btn btn-success">Proses</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->