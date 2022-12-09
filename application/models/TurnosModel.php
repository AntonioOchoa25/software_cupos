<?php

class TurnosModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cargarListaEspera()
    {
        $this->db->select('s.*,
                            t.Id_cliente,
                            p.NombreProceso,
                            a.NombreArea');
        $this->db->from('solicitudes s');
        $this->db->join('procesos p', 's.Id_proceso = p.Id_proceso');
        $this->db->join('turnos t', 's.Id_turno = t.Id_turno');
        $this->db->join('areas a', 't.Id_area = a.Id_area');
        $this->db->where('s.estado',0);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function cargarCasos()
    {
        $this->load->library('table');
        $this->db->select('s.NumeroGestion,
                            s.motivo,
                            s.Descripcion	,
                            s.fecha_creacion,
                            p.NombreProceso,
                            a.NombreArea');
        $this->db->from('solicitudes s');
        $this->db->join('procesos p', 's.Id_proceso = p.Id_proceso');
        $this->db->join('turnos t', 's.Id_turno = t.Id_turno');
        $this->db->join('areas a', 't.Id_area = a.Id_area');
        $this->db->where('s.estado',0);
        $query = $this->db->get();
        $template = array(
            'table_open'            => '<table class="table table-bordered table-striped">',
        );
        $this->table->set_template($template);
        return $this->table->generate($query);
    }

    public function cargarAsignaciones()
    {
        $this->load->library('table');
        $this->db->select('s.NumeroGestion,
                            s.motivo,
                            s.Descripcion	,
                            s.fecha_creacion,
                            p.NombreProceso,
                            a.NombreArea');
        $this->db->from('solicitudes s');
        $this->db->join('procesos p', 's.Id_proceso = p.Id_proceso');
        $this->db->join('turnos t', 's.Id_turno = t.Id_turno');
        $this->db->join('areas a', 't.Id_area = a.Id_area');
        $this->db->where('s.estado',1);
        $query = $this->db->get();
        $template = array(
            'table_open'            => '<table class="table table-bordered table-striped">',
        );
        $this->table->set_template($template);
        return $this->table->generate($query);
    }
}
