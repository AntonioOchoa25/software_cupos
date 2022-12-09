<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClientModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cupo($data=[]){
        $this->db->insert('turnos',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function obtenerCliente($dui=''){
        $id_cliente = 1;
        $consulta = $this->db->query("SELECT Id_cliente,NumeroDocumento FROM clientes
        WHERE NumeroDocumento = ?",[$dui]);
        $respuesta = $consulta->result_array();
        foreach ($respuesta as $valor) {
            if($valor['NumeroDocumento']==$dui){
                $id_cliente = $valor['Id_cliente'];
            }
            else{
                $id_cliente = 1;
            }
        }

        return $id_cliente;
    }

    public function validarCupo($cupo=''){
        $id_cliente = 1;
        $consulta = $this->db->query("SELECT Id_turno, Id_proceso, NumeroGestion FROM solicitudes
        WHERE = ?",[$cupo]);
        $respuesta = $consulta->result_array();
        foreach ($respuesta as $valor) {
            if($valor['NumeroGestion']==$cupo){
                $id_cliente = $valor['Id_cliente'];
            }
            else{
                $id_cliente = 1;
            }
        }

        return $id_cliente;
    }


    public function obtenerAreas(){
        $html = '';
        $consulta = $this->db->query("SELECT Id_area, NombreArea
        FROM areas");
        $respuesta = $consulta->result_array();
        $colores = ["#FF5470","#FF7A00","#418fff","#87FF2A","#FF007C","#E936A7"];
        $iconos = ["team-line","price-tag-3-line","lightbulb-flash-line","service-line","customer-service-2-line","money-dollar-circle-line"];
        $k=0;
        $checked = '';
        $active = '';
        foreach ($respuesta as $valor) {
            $checked = ($k==0) ? 'checked': '';
            $active = ($k==0) ? 'active': '';
            $html .= '<label  title="'.$valor['NombreArea'].'" style="background-color:'.$colores[$k].'" class="btn btn-default btn-lg m-2 text-white rounded-circle '.$active.'">
            <input '.$checked.' type="radio" name="Id_area" value="'.$valor['Id_area'].'" id="Id_area"><i class="ri-'.$iconos[$k].'"></i></label>';
            $k++;
        }

        return $html; 
    }

    public function obtenerprocesos(){
        $html = '';
        $consulta = $this->db->query("SELECT Id_proceso, NombreProceso FROM procesos");
        $respuesta = $consulta->result_array();
        $k=0;
        foreach ($respuesta as $valor) {
        $checked = ($k==0) ? 'checked': '';
        $active = ($k==0) ? 'active': '';
        $html .= '<label class="btn btn-info rounded m-2 btn-lg '.$active.'">
        <input type="radio" data-value="'.$valor['Id_proceso'].'" name="Id_proceso" id="Id_proceso" '.$checked.'>'.$valor['NombreProceso'].'</label>';
        $k++;
        }
        return $html;
    }

    public function guardarProceso($id_turno=0,$Id_proceso=0,$codigo_turno='ABCD'){
        $data = array();
        $cupo = array();
        $result = $this->db->query("SELECT * FROM turnos WHERE Id_turno=?",[$id_turno]);
        foreach ($result->result_array() as $row) {
            $data = $row;
        }
        $data['Id_proceso'] = $Id_proceso;
        $data['NumeroGestion'] = $codigo_turno;
        $data['Id_asesor'] = 1;
        $data['estado'] = 0;
        $this->db->trans_start();
        $query = $this->db->select('Nombre,Apellido')
                ->where('Id_cliente', $data['Id_cliente'])
                ->limit(1)
                ->get('clientes');
        $cupo =  $query->result_array()[0];
        unset($data['Id_cliente']);
        unset($data['Id_caja']);
        $cupo['NumeroGestion'] = $codigo_turno;
        $this->db->insert('solicitudes',$data);
        $cupo['NumeroGestion'] = $codigo_turno;
        $cupo['Id_solicitud'] = $this->db->insert_id();
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return $cupo;
        }

    }

    public function cargarClientes(){
        $this->load->library('table');
        $consulta = $this->db->query("SELECT concat(c.Nombre,' ',c.Apellido) as nombre_completo , c.NumeroDocumento, c.Direccion, c.Telefono, ct.NumeroCuenta
        FROM clientes c inner join cuentas ct on ct.Id_cuenta = c.Id_cuenta 
        WHERE c.estado = 1");
        $template = array(
            'table_open'            => '<table class="table table-bordered table-striped">',
        );
        $this->table->set_template($template);
        return $this->table->generate($consulta);
    }

}