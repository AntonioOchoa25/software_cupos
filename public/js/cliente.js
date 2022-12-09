function EnviarDatos() {
    $.ajax({
        url: base_url+'index.php/client/cupo',
        method:'post',
        data: $('#formularioCliente').serialize(),
        success: function (data) {
            if(data > 0){
                window.location.href = base_url+'index.php/client/procesos?id_turno='+data;
            }

        },
        error: function () {
               alert("Error!!!");
        }
    });
}



function EnviarProceso() {
    let id_turno = $('#id_turno').val();
    $.ajax({
        url: base_url+'index.php/client/guardarProceso',
        method:'post',
        data: {Id_proceso:id_proceso,Id_turno:id_turno},
        success: function (data) {
            document.write(data);
        },
        error: function () {
               alert("Error!!!");
        }
    });
}