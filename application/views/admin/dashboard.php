<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/admin.css">
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Admin Dashboard </div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light"><i class="fa fa-tachometer" style="margin-right: 10px;" aria-hidden="true"></i>Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-light"><i class="fa fa-share" style="margin-right: 10px;" aria-hidden=" true"></i>Peminjaman Barang</a>
                <a href="#" class="list-group-item list-group-item-action bg-light"><i class="fa fa-reply" style="margin-right: 10px;" aria-hidden=" true"></i>Pengembalian Barang</a>
                <a href="#" class="list-group-item list-group-item-action bg-light"><i class="fa fa-check-square" style="margin-right: 10px;" aria-hidden="true"></i>Status Barang</a>
            </div>
            <div class="bg-light" id="box">
                <div class="small">Logged in as:</div>
                User1
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
                            <i class="fa fa-user" aria-hidden="true"></i>
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
                                            <label for="oldPassword">Password Lama</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="newPass">Password Baru</label>
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
                <h2>Dashboard</h2>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Barang Masuk</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link text-decoration-none" href="#">View Details</a>
                                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Barang Keluar</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link text-decoration-none" href="#">View Details</a>
                                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                Moleh gak a?
                            </div>
                            <div class="card-body">
                                askjdhkjasd
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Mosok gak seh?
                            </div>
                            <div class="card-body">
                                ajsdghs
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        Tabel opo ae iki halah...
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
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
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
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