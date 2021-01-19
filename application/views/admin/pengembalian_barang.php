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
                    <form method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="" id="" placeholder="Nama Peminjam">
                        </div>
                        <button class="btn btn-primary"><i class="fa fa-search" style="margin-right: 10px;" aria-hidden="true"></i>Cari</button>
                    </form>
                    <div class="table-responsive-xl">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No Id</th>
                                    <th scope="col">Nama Peminjam</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jumlah Barang</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>
                                        <li>Meja</li>
                                        <li>Layar</li>
                                        <li>Kursi</li>
                                    </td>
                                    <td>
                                        <li>1 Buah</li>
                                        <li>1 Buah</li>
                                        <li>1 Buah</li>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-reply" style="margin-right: 10px;" aria-hidden="true"></i>Pengembalian</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label>Pastikan barang yang dikembalikan sudah diterima dan sudah dicek untuk kondisi dari barang tersebut</label>
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