<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
</head>

<body>
  <div class="py-5 h-100">
    <div class="container">
      <div class="row h-100 mt-5 pt-5" id="container">
        <div class="px-5 col-md-8 text-center mx-auto h-100">
          <input type="hidden" id="Id_solicitud" value="<?= $Id_solicitud; ?>">
          <h3 class="text-primary display-3"> <b>Pasa adelante</b></h3>
          <h2><?= $Nombre." ".$Apellido?></h2>
          <p class="mb-3 lead">TU TURNO ES EL</p>
          <h3 class="text-primary text-uppercase font-bold display-2"><b><?= strtoupper($NumeroGestion); ?></b></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2 offset-md-5 text-center">
        <a onclick="imprimirNumero()" class="btn btn-outline-secondary btn-lg my-2">Imprimir turno</a>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url('assets/js/jquery.min.js') . "?time=" . time(); ?>"></script>
  <script src="<?= base_url('assets/js/popper.min.js') . "?time=" . time(); ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.js') . "?time=" . time(); ?>"></script>
  <script>var base_url = '<?= base_url()?>'</script>
  <script src="<?= base_url('public/js/turnos.js') . "?time=" . time(); ?>"></script>
</body>

</html>