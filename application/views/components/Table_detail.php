<div>
    <label value="<?= $dataPinjaman->id_catatan ?>" id='kodecatatan'>
        <strong>Kode Catatan</strong> : <?= $dataPinjaman->id_catatan ?>
    </label>
    <br />
    <label>
        <strong>Nama Peminjam</strong> : <?= $dataPinjaman->penanggung ?>
    </label>
    <br />
    <label>
        <strong>Nama Tempat</strong> : <?= $dataPinjaman->nama_catatan ?>
    </label>
    <br />
    <label>
        <strong>Nama Pengguna</strong> : <?= $dataPinjaman->username ?>
    </label>
    <p class='text-info'>Informasi : Pastikan untuk memasukkan jumlah barang normal dan rusak, harap mencentang terlebih dahulu</p>
    <form action='' method='post'>
        <div class='table-responsive-xl'>
            <table id='dataPinjam' class='table table-bordered'>
                <thead>
                    <tr>
                        <?php
                        $cart_head = array("kode_barang", "Nama Barang", "Kategori barang", 'Jumlah barang', 'Kondisi Barang', 'Status Barang');
                        foreach ($cart_head as $key => $value) { ?>
                            <th scope='col'>
                                <?= $value ?>
                            </th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($datas_barang as $key => $value) { ?>
                        <tr>
                            <td><?= $value->kode_barang ?></td>
                            <td><?= $value->nama_barang ?></td>
                            <td><?= $value->nama_katagori ?></td>
                            <td><?= $value->jumlah ?></td>
                            <td><?= $value->status_barang ?></td>
                            <td><?= $value->kondisi_barang ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
</div>