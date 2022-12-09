<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <title>Document</title>
</head>
<body>
<?php $this->load->view('shared/navbar'); ?>
<?php $this->load->view('shared/main_container'); ?>
<?php $this->load->view('shared/footer'); ?>
</body>
<script src="<?= base_url('assets/js/jquery.min.js') . "?time=" . time(); ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js') . "?time=" . time(); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.js') . "?time=" . time(); ?>"></script>
<script src="<?= base_url('public/js/turnos.js') . "?time=" . time(); ?>"></script>
</html>