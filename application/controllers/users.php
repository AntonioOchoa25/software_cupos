<?php

class Users extends CI_Controller
{
    public $user;

    public static function redirect($url)
    {
        header("Location: {$url}");
        exit();
    }

    protected function _isSecure()
    {
        // get user session
        $this->_getUser();

        if (!$this->user) {
            self::redirect(base_url("login"));
        }
    }

    protected function _getUser()
    {
        // load session library
        $this->load->library("session");

        // get user id
        $id = $this->session->userdata("user");

        if ($id) {
            // load user model
            $this->load->model("user");

            // get user
            $this->user = new User(array(
                "id" => $id
            ));
        }
    }

    public function register()
    {
        $success = false;

        // load validation library
        $this->load->library("form_validation");

        // if form was posted
        if ($this->input->post("save")) {
            // initialize validation rules
            $this->form_validation->set_rules(array(
                array(
                    "field" => "nombre_usuario",
                    "label" => "nombre_usuario",
                    "rules" => "required|alpha|min_length[3]|max_length[32]"
                ),
                array(
                    "field" => "email",
                    "label" => "Email",
                    "rules" => "required|max_length[100]"
                ),
                array(
                    "field" => "clave",
                    "label" => "clave",
                    "rules" => "required|min_length[8]|max_length[32]"
                )
            ));

            // if form data passes validation...
            if ($this->form_validation->run()) {
                // load user model
                $this->load->model("user");

                // create new user + save
                $user = new User(array(
                    "nombre_usuario" => $this->input->post("nombre_usuario"),
                    "email" => $this->input->post("email"),
                    "clave" => $this->input->post("clave")
                ));
                $user->save();

                // indicate success in view
                $success = true;
            }
        }

        // load view
        $this->load->view("users/register", array(
            "success" => $success
        ));
    }

    public function login()
    {
        $errors = null;

        // load validation library
        $this->load->library("form_validation");

        // if form was posted
        if ($this->input->post("login")) {
            // initialize validation rules
            $this->form_validation->set_rules(array(
                array(
                    "field" => "email",
                    "label" => "Email",
                    "rules" => "required|max_length[100]"
                ),
                array(
                    "field" => "clave",
                    "label" => "clave",
                    "rules" => "required|min_length[4]|max_length[8]"
                )
            ));

            // load user model
            $this->load->model("user");

            // create new user + save
            $user = User::first(array(
                "email" => $this->input->post("email"),
                "clave" => $this->input->post("clave"),
                "activa" => 1
            ));

            // if form data passes validation...
            if ($user && $this->form_validation->run()) {
                // load session library
                $this->load->library("session");

                // save user id to session
                $this->session->set_userdata("user", $user->id);

                // redirect to profile page
                self::redirect(base_url("profile"));
            } else {
                // indicate errors
                $errors = "Su dirección de correo y/ó clave son incorrectas";
            }
        }

        // load view
        $this->load->view("users/login", array(
            "errors" => $errors
        ));
    }

    public function logout()
    {
        // load session library
        $this->load->library("session");

        // remove user id
        $this->session->unset_userdata("user");

        // redirect to login
        self::redirect(base_url("login"));
    }

    public function profile()
    {
        // check for user session
        $this->_isSecure();
        
        // load view
        $this->load->view("users/profile", array(
            "user" => $this->user,
        ));
    }

    public function settings()
    {
        $success = false;

        // check for user session
        $this->_isSecure();

        // load validation library
        $this->load->library("form_validation");

        // if form was posted
        if ($this->input->post("save")) {
            // initialize validation rules
            $this->form_validation->set_rules(array(
                array(
                    "field" => "nombre_usuario",
                    "label" => "nombre_usuario",
                    "rules" => "required|alpha|min_length[3]|max_length[32]"
                ),
                array(
                    "field" => "email",
                    "label" => "Email",
                    "rules" => "required|max_length[100]"
                ),
                array(
                    "field" => "clave",
                    "label" => "clave",
                    "rules" => "required|min_length[4]|max_length[12]"
                )
            ));

            // if form data passes validation...
            if ($this->form_validation->run()) {
                // update user
                $this->user->first = $this->input->post("nombre_usuario");
                $this->user->email = $this->input->post("email");
                $this->user->clave = $this->input->post("clave");
                $this->user->save();

                // indicate success in view
                $success = true;
            }
        }

        // load view
        $this->load->view("users/settings", array(
            "success" => $success,
            "user" => $this->user
        ));
    }

    public function search()
    {
        // get posted data
        $query = $this->input->post("query");
        $order = $this->input->post("order");
        $direction = $this->input->post("direction");
        $page = $this->input->post("page");
        $limit = $this->input->post("limit");

        // default null values
        $order = $order ? $order : "modified";
        $direction = $direction ? $direction : "desc";
        $limit = $limit ? $limit : 10;
        $page = $page ? $page : 1;
        $count = 0;
        $users = null;

        if ($this->input->post("search")) {
            $where = array(
                "nombre_usuario" => $query,
                "activa" => 1
            );

            $fields = array(
                "id", "nombre_usuario"
            );

            // load user model
            $this->load->model("user");

            // get count + results
            $count = User::count($where);
            $users = User::all(
                $where,
                $fields,
                $order,
                $direction,
                $limit,
                $page
            );
        }

        // load view
        $this->load->view("users/search", array(
            "query" => $query,
            "order" => $order,
            "direction" => $direction,
            "page" => $page,
            "limit" => $limit,
            "count" => $count,
            "users" => $users
        ));
    }
}
