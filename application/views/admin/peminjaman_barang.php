<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/admin.css">
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Admin Dashboard </div>
            <div class="list-group list-group-flush">
                <a href="<?= base_url() ?>admin" class="list-group-item list-group-item-action bg-light"><i class="fa fa-tachometer" style="margin-right: 10px;" aria-hidden="true"></i>Dashboard</a>
                <a href="<?= base_url() ?>tambah" class="list-group-item list-group-item-action bg-light"><i class="fa fa-book" style="margin-right: 10px;" aria-hidden=" true"></i></i>Tambah Barang</a>
                <a href="<?= base_url() ?>peminjaman" class="list-group-item list-group-item-action active"><i class="fa fa-share" style="margin-right: 10px;" aria-hidden=" true"></i>Peminjaman Barang</a>
                <a href="<?= base_url() ?>pengembalian" class="list-group-item list-group-item-action bg-light"><i class="fa fa-reply" style="margin-right: 10px;" aria-hidden=" true"></i>Pengembalian Barang</a>
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
                <h2>Peminjaman Barang</h2>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Peminjaman Barang</li>
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
                                        <label for="formGroupExampleInput">Nama Barang</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Pilih Barang</option>
                                            <option>Ngantuk Slur</option>
                                            <option>Moleh gak a?</option>
                                            <option>Ngopi gak a?</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Jumlah Barang</label>
                                        <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Jumlah Barang">
                                    </div>
                                    <button class="btn btn-primary float-right"><i class="fa fa-keyboard" style="margin-right: 10px;" aria-hidden="true"></i>Input Barang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card mb-4">
                            <div class="card-header">
                                Data Peminjaman
                            </div>
                            <div class="card-body">
                                <div class="alert alert-success" role="alert">
                                    <strong>Meja</strong> hanya tersisa <strong>69</strong>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Jumlah Barang</th>
                                            <th scope="col">Kondisi Barang</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Meja</td>
                                            <td>1</td>
                                            <td>Baik</td>
                                            <td>
                                                <button class="btn btn-warning"><i class="fa fa-pencil" style="margin-right: 10px;" aria-hidden="true"></i>Edit</button>
                                                <button class="btn btn-danger"><i class="fa fa-trash" style="margin-right: 10px;" aria-hidden="true"></i>Hapus</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Kursi</td>
                                            <td>1</td>
                                            <td>Baik</td>
                                            <td>
                                                <button class="btn btn-warning"><i class="fa fa-pencil" style="margin-right: 10px;" aria-hidden="true"></i>Edit</button>
                                                <button class="btn btn-danger"><i class="fa fa-trash" style="margin-right: 10px;" aria-hidden="true"></i>Hapus</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-sm ">
                                        <label>Tanggal Pengambilan</label>
                                        <input type="date" class="form-control" name="" id="">
                                    </div>
                                    <div class="col-sm">
                                        <label>Tanggal Pengembalian</label>
                                        <input type="date" class="form-control" name="" id="">
                                    </div>
                                    <div class="col-sm">
                                        <label>Nama Peminjam</label>
                                        <input type="text" class="form-control" id="namaPeminjam" placeholder="Nama peminjam">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <br>
                                <button class="btn btn-success btn-block">Proses</button>
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

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>