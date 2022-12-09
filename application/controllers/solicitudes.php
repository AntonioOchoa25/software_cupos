<?php
class Solicitudes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SolicitudesModel');
        $this->load->helper('date');
        $this->load->helper('calculaTiempo');
    }

    public function cargarSolicitud()
    {
        $post = $this->input->post();
        extract($post);
        $result = (array) $this->SolicitudesModel->cargarCaso($id_solicitud, $id_turno);
        $data = $result[0];
        echo $this->load->view('accions/formulario_casos', $data, true);
    }

    public function cargarProcesos()
    {
        $Id_proceso = $this->input->get('id_proceso');
        echo  $this->SolicitudesModel->cargarProcesos($Id_proceso);
    }

    public function cargarAreas()
    {
        $Id_area = $this->input->get('id_area');
        echo  $this->SolicitudesModel->cargarAreas($Id_area);
    }

    public function guardarCaso()
    {
        $post = $this->input->post();
        echo  $this->SolicitudesModel->guardarCaso($post);
    }
    public function descartarCaso()
    {
        $post = $this->input->post();
    }
}
