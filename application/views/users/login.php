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
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="p-5 col-lg-8 offset-lg-2">
                    <h1>Iniciar sesión</h1>
                    <p class="mb-3">Nos da gusto tenerte de nuevo de regreso</p>
                    <?php if ($errors) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo $errors; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <form method="post">
                        <div class="form-group"> <label for="">Email:</label> <input type="email" class="form-control" placeholder="Ingresa tu email" name="email"> </div>
                        <div class="form-group"> <label for="">Password:</label><input type="password" class="form-control" placeholder="Escribe tu clave" name="clave"> <small class="form-text text-muted text-right">
                                <a href="#">¿Olvisdate tu clave?</a>
                            </small> </div> <button type="submit" name="login" value="login" class="btn btn-primary">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?= base_url('assets/js/jquery.min.js')."?time=".time(); ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js')."?time=".time(); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.js')."?time=".time(); ?>"></script>
</html>