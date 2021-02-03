<!-- Content -->
<div class="container-fluid">
    <h2>Tambah Barang</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tambah Barang</li>
    </ol>
    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4">
                <div class="card-header">
                    <a id="togglekatagori" class="collapse-link text-dark d-flex flex-row align-items-center" data-toggle="collapse" href="#collapsekategori" role="button" aria-expanded="false" aria-controls="collapsekategori">
                        <i id="katagori-fa" class="fa fa-chevron-down mr-3"></i>
                        <h5 class="mb-0">Kategori</h5>
                    </a>
                </div>


                <div class="card-body">
                    <div class="collapse <?php echo form_error('katagoritxt') != null ? "show" : null; ?>" id="collapsekategori">
                        <form method="POST" action="<?= base_url('tambah/katagori') ?>">
                            <div class="form-group">
                                <label for="katagoritxt">Nama Kategori</label>
                                <input type="text" name="katagoritxt" id="tambahkategori" class="form-control" placeholder="Nama Kategori" aria-describedby="helpId">
                                <small id="helpId" class="text-danger"><?= form_error('katagoritxt') ?></small>
                            </div>
                            <button type="submit" class="btn btn-primary float-right"><i class="fa fa-plus" style="margin-right: 10px;" aria-hidden="true"></i>Tambah Kategori</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <a id="togglebarang" class="collapse-link text-dark d-flex flex-row align-items-center" data-toggle="collapse" href="#collapsebarang" role="button" aria-expanded="false" aria-controls="collapsebarang">
                        <i id="barang-fa" class="fa fa-chevron-up mr-3"></i>
                        <h5 class="mb-0">Barang</h5>
                    </a>
                </div>
                <div class="card-body">
                    <div class="collapse show" id="collapsebarang">
                        <form method="POST" action="<?= base_url('tambah/barang') ?>">

                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" name="namabarangtxt" id="" value="<?= set_value('namabarangtxt') ?>" class="form-control" placeholder="Masukkan nama barang" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-danger"><?= form_error('namabarangtxt') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Barang</label>
                                <input type="number" name="jumlahbarangtxt" id="" value="<?= set_value('jumlahbarangtxt') ?>" class="form-control" placeholder="Masukkan jumlah barang" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-danger"><?= form_error('jumlahbarangtxt') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="">Kategori Barang</label>
                                <select class="form-control" name="katagoribarang" id="">
                                    <option selected></option>
                                    <?php if ($kategoriDatas == null) {
                                        echo "<option>kategori kosong</option>";
                                    } else {
                                        foreach ($kategoriDatas as $key => $value) {
                                            echo "<option value=" . $value->id_katagori . " >" . $value->nama_katagori . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="d-flex flex-row">
                                    <a id="tambahtrgr" class="collapse-link m-1 d-flex flex-row align-items-center" data-toggle="collapse" href="#collapsekategori" role="button" aria-expanded="false" aria-controls="collapsebarang">
                                        <label class="form-text mb-0"><i class="fa fa-plus mr-2"></i>Tambah Katagori</label>
                                    </a>
                                </div>
                                <small id="helpId" class="form-text text-danger"><?= form_error('katagoribarang') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="">Kondisi Barang</label>
                                <select class="form-control" name="kondisibarang" id="">
                                    <option selected></option>
                                    <option value="baru">Baru</option>
                                    <option value="rusak">Rusak</option>
                                    <option value="normal">Normal</option>
                                </select>
                                <small id="helpId" class="form-text text-danger"><?= form_error('kondisibarang') ?></small>
                            </div>
                            <button type="submit" class="btn btn-primary float-right"><i class="fa fa-plus" style="margin-right: 10px;" aria-hidden="true"></i>Tambah Barang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Daftar Barang</h5>
                </div>
                <div class="card-body">
                    <?php if ($barangDatas == null) {
                        echo "<tr><h4 class='text-center'>Barang digudang masih kosong</h4><p class='text-center'>Tambahkan barang pada menu yang tersedia</p></tr>";
                    } else { ?>
                        <p>Daftar barang yang ada digudang</p>
                        <table id="listBarang" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Katagori Barang</th>
                                    <th scope="col">Jumlah Barang</th>
                                    <th scope="col">Kondisi Barang</th>
                                    <th scope="col">Status Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($barangDatas as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $value->nama_barang ?></td>
                                        <td><?= $value->nama_katagori ?></td>
                                        <td><?= $value->jumlah_barang ?></td>
                                        <td><?= $value->kondisi_barang ?></td>
                                        <td><?= $value->status_barang ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->