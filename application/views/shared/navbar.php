<nav class="navbar navbar-expand-md navbar-light">
        <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar6">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar6"> <a class="navbar-brand text-primary d-none d-md-block" href="#">
                    <b> QNomy</b>
                </a>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"> <a class="nav-link" href="#">Fila de espera</a> </li>
                    <li class="nav-item"> <a class="nav-link" onclick="cargarCasos()" href="#">Turnos</a> </li>
                    <li class="nav-item"> <a class="nav-link" onclick="cargarAsignaciones()" href="#">Asignaciones</a> </li>
                    <li class="nav-item"> <a class="nav-link" onclick="cargarClientes()" href="#">Clientes</a> </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><span class="nav-link text-muted"><?php echo $user->nombre_usuario; ?></span></li>
                    <li class="nav-item"> <a class="nav-link text-primary" href="#">Cerrar sesión</a> </li>
                </ul>
            </div>
        </div>
    </nav>