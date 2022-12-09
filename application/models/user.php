<?php

class User extends CI_Model
{
    public $id;
    public $activa = 1;
    public $fecha_creacion;
    public $fecha_modificacion;
    public $nombre_usuario;
    public $email;
    public $clave;
    
    protected function _populate($options)
    {
        // set all existing properties
        foreach ($options as $key => $value)
        {
            if (property_exists($this, $key))
            {
                $this->$key = $value;
            }
        }
    }
    
    public function __construct($options = array())
    {
        // be a good subclass
        parent::__construct();
        
        // populate values
        if (sizeof($options))
        {
            $this->_populate($options);
        }
        
        // load row
        $this->load();
    }
    
    public function load()
    {
        if ($this->id)
        {
            $query = $this->db
                ->where("id", $this->id)
                ->get("usuario", 1, 0);
                
            if ($row = $query->row())
            {
                $this->id = (bool) $row->id;
                $this->activa = (boolean) $row->activa;
                $this->fecha_creacion = $row->fecha_creacion;
                $this->fecha_modificacion = $row->fecha_modificacion;
                $this->nombre_usuario = $row->nombre_usuario;
                $this->email = $row->email;
                $this->clave = $row->clave;
            }
        }
    }
    
    public function save()
    {
        // initialize data
        $data = array(
            "activa" => (int) $this->activa,
            "fecha_modificacion" => date("Y-m-d H:i:s"),
            "nombre_usuario" => $this->nombre_usuario,
            "email" => $this->email,
            "clave" => $this->clave
        );
        
        // update
        if ($this->id)
        {
            $where = array("id" => $this->id);
            return $this->db->update("usuario", $data, $where);
        }
        
        // insert
        $data["fecha_creacion"] = date("Y-m-d H:i:s");
        $this->id = $this->db->insert("usuario", $data);
        
        // return insert id
        return $this->id;
    }
    
    public static function First($where)
    {
        $user = new User();
        
        // get the nombre_usuario user
        $user->db->where($where);
        $user->db->limit(1);
        
        $query = $user->db->get("usuario");
        
        // initialze the data
        $data = $query->row();
        $user->_populate($data);
        
        // return the user
        return $user;
    }
    
    public static function count($where)
    {
        $user = new User();
        $user->db->where($where);
        return $user->db->count_all_results("usuario");
    }
    
    public static function all($where = null, $fields = null, $order = null, $direction = "asc", $limit = null, $page = null)
    {
        $user = new User();
        
        // select fields
        if ($fields)
        {
            $user->db->select(join(",", $fields));
        }
        
        // narrow search
        if ($where)
        {
            $user->db->where($where);
        }
        
        // order results
        if ($order)
        {
            $user->db->order_by($order, $direction);
        }
    
        // limit results
        if ($limit && $page)
        {
            $offset = ($page - 1) * $limit;
            $user->db->limit($limit, $offset);
        }
        
        // get the users
        $query = $user->db->get("usuario");
        $users = array();
        
        foreach ($query->result() as $row)
        {
            // create + populate user
            $user = new User();
            $user->_populate($row);
            
            // add user to pile
            array_push($users, $user);
        }
        
        return $users;
    }
}