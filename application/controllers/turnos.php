<?php
class Turnos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TurnosModel');
        $this->load->helper('date');
        $this->load->helper('calculaTiempo');
    }

    public function cargarListaEspera()
    {
        
        $data = array();
        $result = (array) $this->TurnosModel->cargarListaEspera();
        $i=0;
        foreach ($result as $r) {
            $result[$i]['tiempo'] = diferenciaFechas($r['fecha_creacion']);
            $i++;
        }
        $data['turnos'] = $result;
        echo $this->load->view('accions/lista_Espera',$data,true);
    }

    public function cargarCasos(){
        echo $this->TurnosModel->cargarCasos();
    }

    public function cargarAsignaciones(){
        echo $this->TurnosModel->cargarAsignaciones();
    }
}
