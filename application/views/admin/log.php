<!-- Content -->
<div class="container-fluid">
    <h2>Log Gudang</h2>
    <div class="card-body">
        <h5>Riwayat barang masuk dan keluar</h5>
        <table id="listBarang" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <?php foreach (array("No", "Nama", "Peminjam", "Penanggung", "Tipe Barang") as $key => $value) { ?>
                        <th scope="col"><?= $value ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logDatas as $key => $value) { ?>
                    <tr>
                        <?php
                        $dataTable = array($key + 1, $value->nama_riwayat, $value->nama_catatan, $value->penanggung, $value->tipe_catatan);
                        foreach ($dataTable as $key => $value) { ?>
                            <td scope="col"><?= $value ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End of Content -->