<!-- Content -->
<div class="container-fluid">
    <h2>Dashboard</h2>
    <div>
        <div class="my-4">
            <h3>Akumulasi barang yang ada di gudang</h3>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h5 class="font-weight-bold">Barang Baru Digudang</h5>
                        <hr class="bg-white"/>
                        <h5><?= $baru ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h5 class="font-weight-bold">Barang Normal Digudang</h5>
                        <hr class="bg-white"/>
                        <h5><?= $normal ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <h5 class="font-weight-bold">Barang Rusak Digudang</h5>
                        <hr class="bg-white"/>
                        <h5><?= $rusak ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="my-4">
            <h3>Aktifitas Barang masuk dan keluar</h3>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h5 class="font-weight-bold">Jumlah Barang Masuk Digudang</h5>
                        <hr class="bg-white"/>
                        <h5><?= $ada ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <h5 class="font-weight-bold">Jumlah Barang Keluar Digudang</h5>
                        <hr class="bg-white"/>
                        <h5><?= $keluar ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->