<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<div class="d-flex flex-row h-100 clearfix">
    <div class="d-flex flex-column align-items-start justify-content-center p-5 w-35 h-100">
        <!-- Left content here -->
        <!-- Login Content -->
        <h1 class="font-weight-bold">Login</h1>
        <p class="font-italic">Login menggunakan username dan password yang valid</p>
        <div class="w-100 mt-3">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="usernamefor">Username</label>
                    <input type="text" name="username" id="" class="form-control" value="<?php echo set_value('username') ?>" placeholder="username" aria-describedby="helpId">
                    <small id="helpId" class="text-danger"><?= form_error('username') ?></small>
                </div>
                <div class="form-group">
                    <label for="passwordfor">Password</label>
                    <input type="password" name="password" id="" class="form-control" value="<?php echo set_value('password') ?>" placeholder="********" aria-describedby="helpId">
                    <small id="helpId" class="text-danger"><?= form_error('password') ?></small>
                </div>

                <button type="submit" class="btn btn-primary my-4 btn-block"><i class="fas fa-sign-in-alt" style="margin-right: 10px;"></i></i>Login</button>
            </form>
        </div>
    </div>
    <div class="left-wrapper bg-main d-flex w-65">
        <!-- Left content here -->
    </div>
</div>