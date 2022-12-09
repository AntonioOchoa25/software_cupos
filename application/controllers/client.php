<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('ClientModel');
    }

    public function index()
    {
        $data['areas'] = $this->ClientModel->obtenerAreas();
        $this->load->view('clients/index',$data);

    }

    public function cupo()
    {
        $post = $this->input->post();
        extract($post);
        $data['Id_Cliente'] = $this->ClientModel->obtenerCliente($NumeroDocumento);
        $data['Id_area'] = ($Id_area=='on' || $Id_area>0) ? $Id_area : 1;
        $data['Id_caja'] = 1;
        $id_turno = $this->ClientModel->cupo($data);
        echo $id_turno; 
    }

    public function clientesCupo(){
        $this->load->view('clients/cupo');
    }

    public function codigo_aleatorio($longitud) {
        return substr(sha1(time()), 0, $longitud);
    }

    public function espera()
    {
        $this->load->view('clients/espera');
    }

    public function procesos()
    {
        $get = $this->input->get();
        $data['id_turno'] = $get['id_turno'];
        $data['procesos'] = $this->ClientModel->obtenerprocesos();
        $this->load->view('clients/procesos',$data);
    }

    public function guardarProceso()
    {
        $post = $this->input->post();
        extract($post);
        $this->session->set_userdata('Id_proceso',$Id_proceso);
        $codigo_turno = $this->codigo_aleatorio(4);
        $resultado = $this->ClientModel->guardarProceso($Id_turno,$Id_proceso,$codigo_turno);
        if($resultado!=0){
            $this->load->view('clients/cupo',$resultado);
        }
        else{
            $this->session->unset_userdata();
            unset($_SESSION);
            $this->index();
        }
    }

    public function cargarClientes(){
        echo $this->ClientModel->cargarClientes();
    }

}
