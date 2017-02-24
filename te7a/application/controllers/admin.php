<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index() {
        $this->load->view('admin/login');
    }

    public function login() {
        if ($this->input->post('submit')) {
            $this->load->model('admin_model');
            $res = $this->admin_model->login($_POST['username'], $_POST['password']);
            if ($res && $res->num_rows() > 0) {
                $result = $res->row();
                $id = $result->admin_id;
                $name = $result->fullname;
                $factory_id = $result->factory_id;
                $data = array(
                    "id" => $id,
                    "name" => $name,
                    "factory_id" => $factory_id
                );
                $this->session->set_userdata($data);
                $allowedComponents = $this->displayMainPageComponents();
                $data['modules'] = $allowedComponents;
                $this->load->view('admin/index.php', $data);
                //print_r($components);
            } else {
                $error['error'] = 'من فضلك ادخل اسم دخول ورقم سري صحيح';
                $this->load->view('admin/login.php', $error);
            }
        }
    }

    public function displayMainPageComponents() {
        include_once 'permissions.php';
        $permissions = new permissions();
        $permittedComponents = $permissions->getAllPermitted($this->session->userdata('id'))->result();
        $allowedComponents = array();
        foreach ($permittedComponents as $permission) {
            array_push($allowedComponents, $permission->module);
        }
        return $allowedComponents;
    }

    public function checkLogin() {
        $user = $this->session->userdata('name');
        if ($user != '') {
            return 1;
        } else {
            return 0;
        }
    }

    public function pageNotFound() {
        $this->load->view('admin/404.html');
    }

    public function adminPanel() {
        if ($this->checkLogin() == 1) {
            $this->load->library('parser');
            $allowedComponents = $this->displayMainPageComponents();
            $data['modules'] = $allowedComponents;
            $data['login'] = 1;
            $this->parser->parse('admin/index.php', $data);
        } else {
            $this->index();
        }
    }

}
