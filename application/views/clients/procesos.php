<?php $id_turno = isset($id_turno) ? $id_turno : 0; ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Procesos</title>
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/icons/fonts/remixicon.css') ?>">
  <style>
    .btn-group-toggle .active{
      background-color:aqua !important;
      color:#0e0e0e !important;
    }
  </style>
</head>

<body class="bg-dark">
  <div class="py-5 align-items-center d-flex bg-dark h-100 w-100">
    <div class="fluid-container py-5">
      <div class="row">
        <input type="hidden" id="id_turno" value="<?= $id_turno?>">
        <div class="col-md-8 px-md-5 text-white">
          <h1 class="display-3 mb-4">Siempre es un gusto recibirte</h1>
          <p class="lead mb-4">¿Que servicio quieres explorar el dia de hoy?</p>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <?=$procesos;?>
          </div>
        </div>
        <div class="col-md-4 offset-md-2 mt-2 text-center">
        <button type="button" onclick="EnviarProceso()" class="btn btn-success btn-lg my-2">
          Siguiente
        </button>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url('assets/js/jquery.min.js') . "?time=" . time(); ?>"></script>
  <script src="<?= base_url('assets/js/popper.min.js') . "?time=" . time(); ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.js') . "?time=" . time(); ?>"></script>
  <script>
    var base_url = '<?= base_url() ?>';

    let id_proceso = 1;
    let opciones = document.querySelectorAll('#Id_proceso');
    opciones.forEach(element => {
        $(element).click(function(){
            id_proceso = $(this).data('value');
        });
    });
  </script>
  <script src="<?= base_url('public/js/cliente.js') . "?time=" . time(); ?>"></script>
</body>

</html>