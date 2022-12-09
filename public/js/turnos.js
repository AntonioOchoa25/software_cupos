$.get("turnos/cargarListaEspera", function (data, status) {
    $("#lista_espera").html(data);
});

function cargarSolicitud(id_solicitud = 0, id_turno = 0) {
    $.ajax({
        url: "solicitudes/cargarSolicitud",method:'POST', data: { id_solicitud, id_turno }, success: function (result) {
            $("#form_solicitud").html(result);
        }
    });
}

function cargarProcesos(id_proceso=0){
    $.get("solicitudes/cargarProcesos?id_proceso="+id_proceso, function (data, status) {
        $("#Id_proceso").html(data);
    });
}

function cargarAreas(id_area=0){
    $.get("solicitudes/cargarAreas?id_area="+id_area, function (data, status) {
        $("#Id_area").html(data);
    });
}

function cargarCasos(){
    $.get("turnos/cargarCasos", function (data, status) {
        $("#form_solicitud").html(data);
    });
}

function cargarClientes(){
    $.get("client/cargarClientes", function (data, status) {
        $("#form_solicitud").html(data);
    });
}

function cargarAsignaciones(){
    $.get("turnos/cargarAsignaciones", function (data, status) {
        $("#form_solicitud").html(data);
    });
}

function imprimirNumero() {
        var divContents = document.getElementById("container").innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>');
        a.document.write('<body > <h1>QNOMY 1.0</h1><br>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
        window.location.href = base_url+'index.php/client';
}

function siguienteTurno() {
    let listado_turno = localStorage.getItem('listado_turno');
    let items = JSON.parse(listado_turno);
    console.log(items);
    items.forEach(element => {
        console.log(element);
    });
    items.reverse();
    let credenciales = items[0].split("|");
    cargarSolicitud(credenciales[0],credenciales[1]);

}

function guardarCaso(){
    $.ajax({
        url: base_url+'index.php/solicitudes/guardarCaso',
        method:'post',
        data: $('#formulario_casos').serialize(),
        success: function (data) {
            if(data ==1){
                window.location.href = base_url+'index.php/profile';
            }

        },
        error: function () {
               alert("Error!!!");
        }
    });

}
function descartarCaso(){

}