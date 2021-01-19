<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- custom css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-responsive.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/responsive.css">

</head>

<body>

    <!-- your content is loaded at here -->
    <div class="content">
        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">Admin Dashboard </div>
                <div class="list-group list-group-flush">
                    <a href="<?= base_url() ?>admin" class="list-group-item list-group-item-action <?php echo $segment == 'admin' ? "active" : "bg-light"; ?>"><i class="fa fa-tachometer" style="margin-right: 10px;" aria-hidden="true"></i>Dashboard</a>
                    <a href="<?= base_url() ?>tambah" class="list-group-item list-group-item-action <?php echo $segment == 'tambah' ? "active" : "bg-light"; ?>"><i class="fa fa-book" style="margin-right: 10px;" aria-hidden=" true"></i></i>Tambah Barang</a>
                    <a href="<?= base_url() ?>peminjaman" class="list-group-item list-group-item-action <?php echo $segment == 'peminjaman' ? "active" : "bg-light"; ?>"><i class="fa fa-share" style="margin-right: 10px;" aria-hidden=" true"></i>Peminjaman Barang</a>
                    <a href="<?= base_url() ?>pengembalian" class="list-group-item list-group-item-action <?php echo $segment == 'pengembalian' ? "active" : "bg-light"; ?>"><i class="fa fa-reply" style="margin-right: 10px;" aria-hidden=" true"></i>Pengembalian Barang</a>
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
                                <i class="fa fa-user" style="margin-right: 10px;" aria-hidden="true"></i>Aldi
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

                <!-- End of Content -->
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->
    </div>

    <!-- Bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <!-- custom -->
    <script src="<?= base_url() ?>assets/js/main.js"></script>
</body>

</html>