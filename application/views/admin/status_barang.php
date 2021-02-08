<!-- Content -->
<div class="container-fluid">
    <h2>List barang</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List barang</li>
    </ol>
    <div class="accordion" id="accordionExample">
        <div class="card mb-4 border">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" style="color: black; text-decoration: none;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-list" style="margin-right: 10px;" aria-hidden="true"></i>
                        List Barang
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <table id="listBarang" class="table table-striped table-bordered">
                            <?php if ($availableItems != null) {?>
                                <thead>
                                    <tr>
                                        <th scope="col">No ID</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Jumlah Barang</th>
                                        <th scope="col">Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($availableItems as $key => $value) {?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $value->nama_barang ?></td>
                                        <td><?= $value->jumlah_barang ?></td>
                                        <td><?= $value->kondisi_barang ?></td>
                                    </tr>
                                <?php } 
                            } else{
                                echo "<div class='text-center'><h5 class='font-weight-bold'>Daftar barang keluar masih kosong</h5></div>";
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" style="color: black; text-decoration: none;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-list" style="margin-right: 10px;" aria-hidden="true"></i>
                        List Barang yang dipinjamkan
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <table id="listBarang" class="table table-striped table-bordered">
                            <?php if ($outItems != null) {?>
                                <thead>
                                    <tr>
                                        <th scope="col">No ID</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Jumlah Barang</th>
                                        <th scope="col">Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($outItems as $key => $value) {?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $value->nama_barang ?></td>
                                        <td><?= $value->jumlah_barang ?></td>
                                        <td><?= $value->kondisi_barang ?></td>
                                    </tr>
                                <?php } 
                            } else{
                                echo "<div class='text-center'><h5 class='font-weight-bold'>Daftar barang keluar masih kosong</h5></div>";
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Content -->