<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bienviendos</title>
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/icons/fonts/remixicon.css')?>">
</head>

<body class="text-center bg-dark">
  <div class="p-3 h-100 d-flex flex-column">
    <div class="container mb-auto"></div>
    <div class="container w-50 h-75">
      <div class="row h-100">
        <div class="col-md-8 mx-auto text-white">
          <h3 class="display-2 pb-4 mt-5">Bienvenidos</h3>
          <form id="formularioCliente">
            <div class="form-group"> <label class="lead">Ingresa su numero de identificación</label>
            <input name="NumeroDocumento" id="NumeroDocumento" type="text" class="form-control form-control-lg" placeholder="¿Cual es su numero de identificación?"> <small class="form-text text-muted">Por favor solo ingresar numeros</small> </div>
            <div class="form-group"> <label class="lead mt-4">¿Como le podemos servir hoy?</label> </div>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <?= $areas?>
            </div>
          </form>
          <button type="button" onclick="EnviarDatos()" class="btn btn-lg bg-info btn-dark text-light my-4"><b class="">Siguiente</b></button>
        </div>
      </div>
    </div>
    <div class="container mt-auto">
      <div class="row">
        <div class="col-md-12">
          <p class="mt-auto text-secondary">Todos los derechos reservados 2022</p>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url('assets/js/jquery.min.js') . "?time=" . time(); ?>"></script>
  <script src="<?= base_url('assets/js/popper.min.js') . "?time=" . time(); ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.js') . "?time=" . time(); ?>"></script>
  <script>var base_url = '<?= base_url()?>'</script>
  <script src="<?= base_url('public/js/cliente.js') . "?time=" . time(); ?>"></script>
</body>

</html>