<style>
    @media screen and (max-width: 768px) {
        #bg-img {
            visibility: hidden;
        }
    }
</style>
<div class="d-flex flex-row position-absolute h-100 w-100">
    <div class="d-flex flex-column align-items-start justify-content-center p-5 w-35 h-100">
        <!-- Left content here -->
        <!-- Login Content -->
        <h1 class="font-weight-bold">Daftar Akun</h1>
        <p>Pendaftaran akun untuk akses ke sistem ini</p>
        <div class="w-100 mt-3">
            <form method="POST" name="" action="">
                <div class="form-group">
                    <label for="formGroupExampleInput">Username</label>
                    <input class="form-control" type="text" name="usernameInput" id="" placeholder="Username">
                    <small id="helpId" class="form-text text-danger"><?= form_error('usernameInput') ?></small>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Password</label>
                    <input class="form-control" type="password" name="passwordInput" id="" placeholder="********">
                    <small id="helpId" class="form-text text-danger"><?= form_error('passwordInput') ?></small>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Konfirmasi Password</label>
                    <input class="form-control" type="password" name="confpasswordInput" id="" placeholder="********">
                    <small id="helpId" class="form-text text-danger"><?= form_error('confpasswordInput') ?></small>
                </div>
                <button class="btn btn-primary my-4 btn-block"><i class="fas fa-user-plus" style="margin-right: 10px;"></i>Register</button>
            </form>

            <p>Sudah mempunyai akun? log in sekarang!</p>
            <a href="<?php base_url() ?>login" class="btn btn-success btn-block"><i class="fas fa-sign-in-alt" style="margin-right: 10px;"></i>Login</a>
        </div>
    </div>
    <div class="left-wrapper bg-main d-flex w-65" id="bg-img">
        <!-- Left content here -->
        <img src="<?php base_url() ?>assets/image/register.png" class="w-100" alt="">
    </div>
</div>