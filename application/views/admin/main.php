<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">
            <h4>Admin Dashboard</h4>
        </div>
        <div class="list-group list-group-flush">
            <a href="<?= base_url() ?>admin" class="list-group-item list-group-item-action <?php echo $segment == 'admin' ? "active" : "bg-light"; ?>"><i class="fa fa-tachometer" style="margin-right: 10px;" aria-hidden="true"></i>Dashboard</a>
            <a href="<?= base_url() ?>tambah" class="list-group-item list-group-item-action <?php echo $segment == 'tambah' ? "active" : "bg-light"; ?>"><i class="fa fa-book" style="margin-right: 10px;" aria-hidden=" true"></i></i>Tambah Barang</a>
            <a href="<?= base_url() ?>peminjaman" class="list-group-item list-group-item-action <?php echo $segment == 'peminjaman' ? "active" : "bg-light"; ?>"><i class="fa fa-share" style="margin-right: 10px;" aria-hidden=" true"></i>Peminjaman Barang</a>
            <a href="<?= base_url() ?>pengembalian" class="list-group-item list-group-item-action <?php echo $segment == 'pengembalian' ? "active" : "bg-light"; ?>"><i class="fa fa-reply" style="margin-right: 10px;" aria-hidden=" true"></i>Pengembalian Barang</a>
            <a href="<?= base_url() ?>status" class="list-group-item list-group-item-action <?php echo $segment == 'status' ? "active" : "bg-light"; ?>"><i class="fa fa-list" style="margin-right: 10px;" aria-hidden="true"></i>List Barang</a>
            <div class="dropdown">
                <button class="dropdown-toggle list-group-item list-group-item-action bg-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user" style="margin-right: 10px;" aria-hidden="true"></i>User
                </button>
                <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                    <a href="<?= base_url() ?>user" class="list-group-item list-group-item-action "><i class="fa fa-plus" style="margin-right: 10px;" aria-hidden="true"></i>Tambah User</a>
                </div>
            </div>

        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <!-- Navbar -->
        <nav class="navbar navbar-light bg-light border-bottom">
            <button class="btn btn-white" id="menu-toggle"><i class="fa fa-bars" style="margin-right: 10px;"></i>Menu</button>
            <div class="user">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- Username here -->
                        <i class="fa fa-user" style="margin-right: 10px;" aria-hidden="true"></i><?= $userDatas->username ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#changePassword"><i class="fa fa-cog" style="margin-right: 10px;" aria-hidden="true"></i>Change Password </button>
                        <button class="dropdown-item" id="doLogout" type="button"><i class="fa fa-sign-out-alt" style="margin-right: 10px;" aria-hidden="true"></i>Logout</button>
                    </div>
                </div>
                <!-- Modal Change Password -->
                <div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="user" aria-hidden="true">
                    <div class="modal-dialog h-100 d-flex justify-content-center align-items-center">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changePassword">Change Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url() ?><?= $this->uri->segment(1) ?>/changepassword/" method="post">
                                    <div class="form-group">
                                        <label for="oldpassword">Password lama</label>
                                        <input type="text" name="oldpassword" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                        <small id="helpId" class="text-danger"><?= form_error('oldpassword') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="newpassword">Password baru</label>
                                        <input type="text" name="newpassword" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                        <small id="helpId" class="text-danger"><?= form_error('newpassword') ?></small>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Change Password -->
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Content -->
        <div class="my-3">
            <?= $content ?>
        </div>
        <!-- End of Content -->
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->