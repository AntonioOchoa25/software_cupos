<?php
$turnos = isset($turnos) ? (array) $turnos : array();
$listado_turno_solicitudes = array();
?>
<div class="list-group">
    <?php foreach ($turnos as $t) : 
        
        array_push($listado_turno_solicitudes,"{$t['Id_solicitud']}|{$t['Id_turno']}");
        
    ?>

        <a  onclick="cargarSolicitud(<?= $t['Id_solicitud']; ?>,<?= $t['Id_turno']; ?>)" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"> <strong>Numero de gestión:</strong> <?= $t["NumeroGestion"]; ?></h5> <small><?= $t["tiempo"]; ?></small>
            </div>
            <p class="mb-1">
                <strong>Proceso:</strong> <?= $t["NombreProceso"]; ?>
            </p>
            <small><strong>ÁREA: </strong> <?= $t["NombreArea"]; ?></small>
        </a>

    <?php endforeach; 

    $listado_turno = json_encode($listado_turno_solicitudes);
    ?>
</div>
<script>
    localStorage.setItem('listado_turno', '<?= $listado_turno;?>');
</script>