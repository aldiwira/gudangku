<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Admin Dashboard </div>
        <div class="list-group list-group-flush">
            <a href="<?= base_url() ?>admin" class="list-group-item list-group-item-action bg-light"><i class="fa fa-tachometer" style="margin-right: 10px;" aria-hidden="true"></i>Dashboard</a>
            <a href="<?= base_url() ?>tambah" class="list-group-item list-group-item-action bg-light"><i class="fa fa-book" style="margin-right: 10px;" aria-hidden=" true"></i></i>Tambah Barang</a>
            <a href="<?= base_url() ?>peminjaman" class="list-group-item list-group-item-action bg-light"><i class="fa fa-share" style="margin-right: 10px;" aria-hidden=" true"></i>Peminjaman Barang</a>
            <a href="<?= base_url() ?>pengembalian" class="list-group-item list-group-item-action active"><i class="fa fa-reply" style="margin-right: 10px;" aria-hidden=" true"></i>Pengembalian Barang</a>
            <a href="#" class="list-group-item list-group-item-action bg-light"><i class="fa fa-check-square" style="margin-right: 10px;" aria-hidden="true"></i>Status Barang</a>
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
                        <i class="fa fa-user" style="margin-right: 10px;" aria-hidden="true"></i>User1
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#changePassword"> Change Password </button>
                        <button class="dropdown-item" type="button">Logout</button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="user" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changePassword">Change Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="oldPassword">Password Baru</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="newPass">Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" id="newPass">
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Content -->
        <div class="container-fluid">
            <h2>Pengembalian Barang</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pengembalian Barang</li>
            </ol>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            Petugas: User1
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nama Peminjam</label>
                                    <input type="text" class="form-control" name="" id="" placeholder="Nama peminjam">
                                </div>
                                <button class="btn btn-primary float-right"><i class="fa fa-search" style="margin-right: 10px;" aria-hidden="true"></i>Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            Data Barang
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Jumlah Barang</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Content -->
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->