<table id="listBarang" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Katagori Barang</th>
            <th scope="col">Jumlah Barang</th>
            <th scope="col">Kondisi Barang</th>
            <th scope="col">Status Barang</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($barangDatas as $key => $value) { ?>
            <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><?= $value->nama_barang ?></td>
                <td><?= $value->nama_katagori ?></td>
                <td><?= $value->jumlah_barang ?></td>
                <td><?= $value->kondisi_barang ?></td>
                <td><?= $value->status_barang ?></td>
                <td>
                    <button type='button' value="<?= $value->kode_barang ?>" onClick='' class='btn btn-sm btn-danger'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>