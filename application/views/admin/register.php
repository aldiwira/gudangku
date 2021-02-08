<!-- Content -->
<div class="container-fluid">
    <h2>Data user</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Data user</li>
    </ol>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="peminjaman-barang-list" data-toggle="list" href="#peminjaman-barang" role="tab" aria-controls="home">List User</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fab fa-dropbox" style="margin-right: 10px;" aria-hidden="true"></i>
                            Register User
                        </div>
                        <div class="card-body">
                            <form method="POST" name="" action="<?= base_url() ?>user/register">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Username</label>
                                    <input class="form-control" type="text" name="usernameInput" id="" placeholder="Username">
                                    <small id="helpId" class="form-text text-danger"><?= form_error('usernameInput') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Password</label>
                                    <input class="form-control" type="password" name="passwordInput" id="" placeholder="Password">
                                    <small id="helpId" class="form-text text-danger"><?= form_error('passwordInput') ?></small>
                                </div>
                                <button class="btn btn-primary float-right" name="inputbrg"><i class="fa fa-keyboard" style="margin-right: 10px;" aria-hidden="true"></i>Register</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
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
                                            <th scope="col">Username</th>
                                            <th scope="col">Admin/User</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $key => $value) { ?>
                                            <tr>
                                                <th scope="row"><?= $key + 1 ?></th>
                                                <td><?= $value->username ?></td>
                                                <?php if ($value->isAdmin == 1) {
                                                    echo "<td>Admin</td>";
                                                } else {
                                                    echo "<td>User</td>";
                                                } ?>
                                                <td>
                                                    <?php if ($value->isAdmin == 0) { ?>
                                                        <a href="user/update/<?= $value->id_pengguna ?>" class="btn btn-primary"><i class="fa fa-pencil" style="margin-right: 10px;" aria-hidden="true"></i>Angkat jadi Admin</a>
                                                    <?php } ?>
                                                    <a href="user/delete/<?= $value->id_pengguna ?>" class="btn btn-danger"><i class="fa fa-trash" style="margin-right: 10px;" aria-hidden="true"></i>Hapus</a>
                                                </td>
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
    </div>
</div>
<!-- End of Content -->`