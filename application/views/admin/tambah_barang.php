<!-- Content -->
<div class="container-fluid">
    <h2>Tambah Barang</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tambah Barang</li>
    </ol>
    <div class="row">
        <div class="col-4">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Katagori
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse m-2" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <form method="POST" action="<?= base_url('tambah/katagori') ?>">
                                <div class="form-group">
                                    <label for="katagoritxt">Nama Katagori</label>
                                    <input type="text" name="katagoritxt" id="" class="form-control" placeholder="Nama Katagori" aria-describedby="helpId">
                                    <small id="helpId" class="text-danger"><?= form_error('katagoritxt') ?></small>
                                </div>
                                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-plus" style="margin-right: 10px;" aria-hidden="true"></i>Tambah Barang</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-dark" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Tambah Barang
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse m-2 show" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="">Nama Barang</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Barang</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="">Kondisi Barang</label>
                                    <select class="form-control" name="" id="">
                                        <option selected></option>
                                        <option>Baru</option>
                                        <option>Rusak</option>
                                        <option>Normal</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-plus" style="margin-right: 10px;" aria-hidden="true"></i>Tambah Barang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card ">
                <div class="card-header">
                    Daftar Barang
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Kondisi Barang</th>
                                <th scope="col">Status Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->