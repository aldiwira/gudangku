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
                    <div id="listBarang" class="table-responsive-xl">
                        <table id="listkembaliBarang" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No Id</th>
                                    <th scope="col">Nama Tempat</th>
                                    <th scope="col">Nama Peminjam</th>
                                    <th scope="col">Petugas</th>
                                    <th scope="col">Tanggal Kembali</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBarangPinjam">
                                <?php foreach ($semuaPinjaman as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value->id_catatan ?></td>
                                        <td><?= $value->nama_catatan ?></td>
                                        <td><?= $value->penanggung ?></td>
                                        <td><?= $value->username ?></td>
                                        <td><?= date("d - m -Y", strtotime($value->tanggal_kembali)) ?></td>
                                        <td>
                                            <button id="kembaliBarang" onclick="onModalBarang('<?= $value->id_detail_catatan ?>')" type="button" data-toggle="modal" data-target="#pinjamModal" class="btn btn-primary">Pengembalian</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="pinjamModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div id="modalBarangAmbil" class="modal-body">
                                <!-- ada di main js -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                <button type="button" onclick="doSubmitKembali()" class="btn btn-success">Selesai</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->