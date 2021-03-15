<!-- Content -->
<div class="container-fluid">
    <h2>Data user</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Data user</li>
    </ol>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header"><i class="fa fa-table" style="margin-right: 10px;" aria-hidden="true"></i>
                    Data User
                </div>
                <div class="card-body">
                    <div class="table-responsive-xl">
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kategori as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $value->nama_katagori ?></td>
                                        <td><a href="kategori/delete/<?= $value->id_katagori ?>" class="btn btn-danger"><i class="fa fa-trash" style="margin-right: 10px;" aria-hidden="true"></i>Hapus</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->`