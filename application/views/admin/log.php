<!-- Content -->
<div class="container-fluid">
    <h2>Log Gudang</h2>
    <div class="card-body">
        <h5>Riwayat barang masuk dan keluar</h5>
        <table id="listBarang" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <?php foreach (array("No", "Nama", "Peminjam", "Penanggung", "Tipe Barang", "Tanggal", "Nama Pengguna", "Detail") as $key => $value) { ?>
                        <th scope="col"><?= $value ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logDatas as $key => $value) { ?>
                    <?php $detail_catatan = $value->id_detail_catatan ?>
                    <tr>
                        <?php
                        $dataTable = array($key + 1, $value->nama_riwayat, $value->nama_catatan, $value->penanggung, $value->tipe_catatan, date("l, d m Y H:i:s", strtotime($value->createdAt)), $value->username);
                        foreach ($dataTable as $key => $value) { ?>
                            <td scope="col"><?= $value ?></td>
                        <?php } ?>
                        <td scope="col">
                            <button id="kembaliBarang" onclick="showDetailLogs('<?= $detail_catatan ?>')" type="button" data-toggle="modal" data-target="#pinjamModal" class="btn btn-primary">Detail</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="pinjamModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <div class="modal-title">
                        <label>Detail Log</label>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modalLogger" class="modal-body">
                    <!-- ada di main js -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->