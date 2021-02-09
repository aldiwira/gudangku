<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-sidebar" id="sidebar-wrapper">
        <div class="sidebar-heading">
            <h4>Admin Dashboard</h4>
        </div>
        <div class="list-group list-group-flush">
            <a href="<?= base_url("admin") ?>" class="list-group-item list-group-item-action <?php echo $segment == 'admin' ? "bg-sidebar-active" : "bg-sidebar-item"; ?>"><i class="fa fa-tachometer" style="margin-right: 10px;" aria-hidden="true"></i>Dashboard</a>
            <a href="<?= base_url("tambah") ?>" class="list-group-item list-group-item-action <?php echo $segment == 'tambah' ? "bg-sidebar-active" : "bg-sidebar-item"; ?>"><i class="fa fa-book" style="margin-right: 10px;" aria-hidden=" true"></i></i>Tambah Barang</a>
            <a href="<?= base_url("peminjaman") ?>" class="list-group-item list-group-item-action <?php echo $segment == 'peminjaman' ? "bg-sidebar-active" : "bg-sidebar-item"; ?>"><i class="fa fa-share" style="margin-right: 10px;" aria-hidden=" true"></i>Peminjaman Barang</a>
            <a href="<?= base_url("pengembalian") ?>" class="list-group-item list-group-item-action <?php echo $segment == 'pengembalian' ? "bg-sidebar-active" : "bg-sidebar-item"; ?>"><i class="fa fa-reply" style="margin-right: 10px;" aria-hidden=" true"></i>Pengembalian Barang</a>
            <a class="list-group-item list-group-item-action dropdown <?php echo $segment == 'status' ? "bg-sidebar-active" : "bg-sidebar-item"; ?>" data-toggle="collapse" href="#collapseBarang" role="button" aria-expanded="false" aria-controls="collapseBarang">
                <i class="fa fa-list" style="margin-right: 10px;" aria-hidden="true"></i>List<i class="dropdown-toggle float-right"></i>
            </a>
            <div class="collapse <?php echo $segment == 'status' ? "show" : "a"; ?>" id="collapseBarang">
                <div class="">
                    <a href="<?= base_url("status") ?>" class="list-group-item list-group-item-action <?php echo $segment == 'status' ? "bg-sidebar-active" : "bg-sidebar-item"; ?>"><i class="fa fa-list" style="margin-right: 10px;" aria-hidden="true"></i>List Barang</a>
                </div>
            </div>
            <a href="<?= base_url("log") ?>" class="list-group-item list-group-item-action dropdown <?php echo $segment == 'log' ? "bg-sidebar-active" : "bg-sidebar-item"; ?>" <?php echo $users_check ? "show" : "hidden"; ?>>
                <i class="fa fa-user" style="margin-right: 10px;" aria-hidden="true"></i>Log
            </a>
            <a class="list-group-item list-group-item-action dropdown <?php echo $segment == 'user' ? "bg-sidebar-active" : "bg-sidebar-item"; ?>" <?php echo $users_check ? "show" : "hidden"; ?> data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa fa-user" style="margin-right: 10px;" aria-hidden="true"></i>User<i class="dropdown-toggle float-right"></i>
            </a>
            <div class="collapse <?php echo $segment == 'user' ? "show" : "a"; ?>" id="collapseExample">
                <div class="">
                    <a href="<?= base_url() ?>user" class="list-group-item list-group-item-action <?php echo $segment == 'user' ? "bg-sidebar-active" : "bg-sidebar-item"; ?> "><i class="fa fa-list" style="margin-right: 10px;" aria-hidden="true"></i>List User</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" class="bg-light">
        <!-- Navbar -->
        <nav class="navbar navbar-dark bg-sidebar border-bottom">
            <button class="btn btn-white navbar-brand" id="menu-toggle">
                <i class="fa fa-bars" style="margin-right: 10px;"></i>
                Menu
            </button>
            <div class="user navbar-toggler">
                <div class="dropdown">
                    <a class="btn btn-white dropdown-toggle text-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- Username here -->
                        <i class="fa fa-user" style="margin-right: 10px;" aria-hidden="true"></i><?= $userDatas->username ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#changePassword"><i class="fa fa-cog" style="margin-right: 10px;" aria-hidden="true"></i>Change Password </button>
                        <button class="dropdown-item" id="doLogout" type="button"><i class="fa fa-sign-out-alt" style="margin-right: 10px;" aria-hidden="true"></i>Logout</button>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Content -->
        <div class="overflow-auto p-2">
            <?= $content ?>
        </div>
        <!-- End of Content -->
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
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->