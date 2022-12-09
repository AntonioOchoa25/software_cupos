<?php

class SolicitudesModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cargarCaso($id_solicitud = 0, $id_turno = 0)
    {
        $this->db->select('s.*,
                            t.Id_cliente,
                            c.*,
                            p.NombreProceso,
                            a.NombreArea');
        $this->db->from('solicitudes s');
        $this->db->join('procesos p', 's.Id_proceso = p.Id_proceso');
        $this->db->join('turnos t', 's.Id_turno = t.Id_turno');
        $this->db->join('areas a', 't.Id_area = a.Id_area');
        $this->db->join('clientes c', 't.Id_cliente = c.Id_cliente');
        $this->db->where('s.Id_solicitud', $id_solicitud);
        $this->db->where('t.Id_turno', $id_turno);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function cargarProcesos($Id_proceso = 0)
    {
        $html = '';
        $query = $this->db->query('SELECT Id_proceso, NombreProceso FROM procesos');
        $resultado = $query->result_array();
        foreach ($resultado as $r) {
            if ($r['Id_proceso'] == $Id_proceso) {
                $html .= '<option value="' . $r['Id_proceso'] . '" selected >' . $r['NombreProceso'] . '</option>';
            } else {
                $html .= '<option value="' . $r['Id_proceso'] . '">' . $r['NombreProceso'] . '</option>';
            }
        }

        return $html;
    }

    public function cargarAreas($Id_area = 0)
    {
        $html = '';
        $query = $this->db->query('SELECT Id_area, NombreArea FROM Areas');
        $resultado = $query->result_array();
        foreach ($resultado as $r) {
            if ($r['Id_area'] == $Id_area) {
                $html .= '<option value="' . $r['Id_area'] . '" selected >' . $r['NombreArea'] . '</option>';
            } else {
                $html .= '<option value="' . $r['Id_area'] . '">' . $r['NombreArea'] . '</option>';
            }
        }

        return $html;
    }

    public function guardarCaso($data)
    {
        $caso = array();
        $this->db->trans_start();
        $caso['estado'] = 1;
        extract($data);
        $caso['motivo'] = $motivo;
        $caso['Descripcion'] = $Descripcion;
        $caso['Id_proceso'] = $Id_proceso;
        $caso['Id_area'] = $Id_area;
        $this->db->where('Id_solicitud',$Id_solicitud);
        $this->db->update('solicitudes', $caso);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        } else {
            $this->db->trans_commit();
            return 1;
        }
    }
}
