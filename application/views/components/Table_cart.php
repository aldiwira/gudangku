<?php
$output = '';
$count = 0;
foreach ($this->cart->contents() as $key => $value) {
    $count++;
?>
    <tr>
        <td><?= $count ?></td>
        <td><?= $this->cruder_m->where("barang", array("kode_barang" => $value["name"]), "nama_barang")->row()->nama_barang ?></td>
        <td><?= $this->cruder_m->where("kategori", array("id_katagori" => $value["options"]["kategori"]), "nama_katagori")->row()->nama_katagori ?></td>
        <td><?= $value["qty"] ?></td>
        <td>Baik</td>
        <td>
            <button type='button' value="<?= $value["rowid"] ?>" id='deleteCartItem' onClick='deleteCartItems("<?= $value["rowid"] ?>")' class='btn btn-sm btn-danger'>
                <i class='fa fa-trash' aria-hidden='true'></i>
            </button>
        </td>
    </tr>
<?php } ?>