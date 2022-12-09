<?php $estado_ciente = (isset($estado) && $estado == 1) ? 'Activo' : 'Inactivo' ?>

<h3 class="mb-3">
    <?= $Apellido . ',' . $Nombre; ?>
    &nbsp;
    <small><span class="badge badge-pill badge-success">
            <?= $estado_ciente ?>
        </span></small>
</h3>
<a onclick="siguienteTurno();" class="btn btn-outline-danger btn-sm float-right">Siguiente turno</a>
<p class="lead break">Datos del cliente</p>
<form id="formulario_casos">
    <input type="hidden" name="Id_solicitud" value="<?=$Id_solicitud;?>">
    <input type="hidden" name="Id_cliente" value="<?=$Id_cliente;?>">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombres</label>
            <input type="text" class="form-control" id="Nombre" value="<?= $Nombre; ?>" name="Nombre" placeholder="Nombres" />
        </div>

        <div class="form-group col-md-6">
            <label>Apellidos</label>
            <input type="text" class="form-control" id="Apellido" value="<?= $Apellido; ?>" name="Apellido" placeholder="Apellido" />
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Teléfono</label>
            <input type="number" class="form-control" id="Telefono" name="Telefono" value="<?= $Telefono; ?>" placeholder="Teléfono (optional)" />
        </div>

        <div class="form-group col-md-6">
            <label>N° de identidad</label>
            <input type="text" class="form-control" id="NumeroDocumento" name="NumeroDocumento" value="<?= $NumeroDocumento; ?>" placeholder="N° documento" />
        </div>
    </div>
    <div class="form-group">
        <p class="lead break">Datos de la vista</p>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Area</label>
                <select name="Id_area" id="Id_area" class="form-control"></select>
            </div>
            <div class="form-group col-md-6">
                <label for="">Proceso</label>
                <select name="Id_proceso" id="Id_proceso" class="form-control"></select>
            </div>
        </div>
        <label>Fecha de visita</label>
        <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" placeholder="Fecha" value="<?= date('Y-m-d',strtotime($fecha_creacion)); ?>" />
        <div class="form-group">
            <label>Motivo de la consulta</label><input type="text" class="form-control" id="motivo" name="motivo" placeholder="Titulo de caso" />
        </div>
    </div>
    <div class="form-group">
        <label>Descripción</label>
        <textarea class="form-control" id="Descripcion" name="Descripcion" rows="4" placeholder="Anota algunos detalles"></textarea>
    </div>
    <button type="button" onclick="guardarCaso()" class="btn btn-primary">Guardar</button>
    <button type="button" onclick="descartarCaso()" class="btn btn-outline-secondary">Descartar</button>
</form>
<script>var base_url = '<?= base_url()?>'</script>
<script>
    cargarProcesos(<?= $Id_proceso;?>);
    cargarAreas(<?= $Id_area;?>);
</script>