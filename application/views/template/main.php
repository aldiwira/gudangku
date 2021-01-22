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
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/toastr.min.css">

</head>

<body>
    <!-- your content is loaded at here -->
    <div class="content">
        <?= $content ?>
    </div>

    <!-- Bootstrap js and app-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/toastr.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <!-- custom -->
    <script src="<?= base_url() ?>assets/js/main.js"></script>

    <script type='text/javascript'>
        $(document).ready(() => {
            $('#changePassword').on('hidden.bs.modal', function(e) {
                <?php session_destroy() ?>
            })
            <?php if (isset($_SESSION['toast'])) { ?>
                toastr.options.closeButton = true;
                var toastvalue = "<?php echo $_SESSION['toast'] ?>";
                var status = toastvalue.split(":")[0];
                var message = toastvalue.split(":")[1];
                if (status === "success") {
                    toastr.success(message, status);
                } else if (status === "error") {
                    toastr.error(message, status);
                }
            <?php } ?>
            <?php if (isset($_SESSION['failedchange'])) { ?>
                var stt = "<?php echo $_SESSION['failedchange'] ?>";
                if (stt === "show") {
                    $("#changePassword").modal('show');
                }
            <?php } ?>
        });
    </script>
</body>

</html>