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
      <div class="row">
        <div class="px-md-5 p-3 col-md-6 d-flex flex-column align-items-start justify-content-center">
          <h1>TURNO DEL CLIENTE</h1>
          <h3 class="display-3 text-primary"><b>A20</b></h3>
          <h2>EN LA VENTANILLA</h2>
          <h3 class="text-warning display-3"><b>4</b></h3>
          <h2>Proximos en pasar</h2>
          <div class="container d-flex justify-content-around bg-light py-2">
            <span class="btn btn-primary btn-lg lead">A1</span>
            <span class="btn btn-primary btn-lg lead">C2</span>
            <span class="btn btn-primary btn-lg lead">D3</span>
            <span class="btn btn-primary btn-lg lead">D3</span>
          </div>
        </div>
        <div class="col-md-6 h-100 d-flex justify-content-center align-items-center">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-right text-uppercase"><b>TURNOS ANTERIORES</b></h2>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Mark</td>
                      <td>Otto</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Jacob</td>
                      <td>Thornton</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Larry</td>
                      <td>the Bird</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="row">
                <div class="col-md-12">&nbsp;</div>
                <div class="col-md-12">
                  <h2 class="text-right">TIEMPO DE ESPERA<br><b class="text-info">8 minutos aproximadamente</b></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12"></div>
      </div>
    </div>
  </div>
  <script src="<?= base_url('assets/js/jquery.min.js') . "?time=" . time(); ?>"></script>
  <script src="<?= base_url('assets/js/popper.min.js') . "?time=" . time(); ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.js') . "?time=" . time(); ?>"></script>
</body>

</html>