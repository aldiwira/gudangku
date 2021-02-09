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
    <p class='text-info'>Informasi : Pastikan untuk memasukkan jumlah barang normal dan rusak, harap mencentang terlebih dahulu</p>
    <form action='' method='post'>
        <div class='table-responsive-xl'>
            <table id='dataPinjam' class='table table-bordered'>
                <thead>
                    <tr>
                        <?php foreach ($headRow as $key => $value) { ?>
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
                            <td><?= $value->nama_barang ?></td>
                            <td><?= $value->nama_katagori ?></td>
                            <td><?= $value->jumlah ?></td>
                            <td>
                                <div class='input-group mb-3'>
                                    <div class='input-group-prepend'>
                                        <div class='input-group-text'>
                                            <input type='checkbox' aria-label='Checkbox for following text input'>
                                        </div>
                                    </div>
                                    <input type='number' id='valueNormal" . $key . "' class='form-control' placeholder='Jika ada centang terlebih dahulu' aria-label='Text input with checkbox'>
                                </div>
                            </td>
                            <td>
                                <div class='input-group mb-3'>
                                    <div class='input-group-prepend'>
                                        <div class='input-group-text'>
                                            <input type='checkbox' aria-label='Checkbox for following text input'>
                                        </div>
                                    </div>
                                    <input type='number' id='valueRusak" . $key . "' class='form-control' placeholder='Jika ada centang terlebih dahulu' aria-label='Text input with checkbox'>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
</div>