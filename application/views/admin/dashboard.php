<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<style>
    body,
    html {
        height: 100%;
    }

    @media (min-width: 768px) {
        aside {
            height: 100%;
        }
    }

    .link {
        color: black;
    }

    .box {
        border: 2px solid gray;
    }
</style>

<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <aside class="col-12 col-md-2 p-0 bg-light fixed-top">
                <nav class="navbar navbar-expand navbar bg-light flex-md-column flex-row align-items-start py-2">
                    <div class="collapse navbar-collapse align-items-start">
                        <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                            <li class="nav-item">
                                <a class="nav-link pl-0 text-nowrap link" href="#"><span class="font-weight-bold">Admin Dashboard</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0 link" href="#"><i class="fa fa-plus fa-fw"></i> <span class="d-none d-md-inline">Tambah Barang</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0 link" href="#"><i class="fa fa-arrow-right fa-fw"></i> <span class="d-none d-md-inline">Peminjaman Barang</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0 link" href="#"><i class="fa fa-arrow-left fa-fw"></i> <span class="d-none d-md-inline">Pengembalian Barang</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0 link" href="#"><i class="fa fa-book fa-fw"></i> <span class="d-none d-md-inline">Status Barang</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>
            <main class="col offset-md-2 bg-faded py-3">
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

                <!-- Table barang masuk/keluar/booking -->
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
            </main>
        </div>
    </div>

</body>

</html>