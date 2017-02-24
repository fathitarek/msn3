<?php

class Module extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'permissions.php';
        include_once 'admin.php';
    }

    public function module_management() {
        $admin = new Admin();
        $permissions = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 4);
                if ($perm->outer_view == 1) {
                    $crud = new grocery_CRUD();
                    $crud->set_theme('datatables');
                    $crud->set_table('modules');
                    $crud->set_subject('موديول');

                    $crud->display_as('module', 'موديول');
                    $crud->display_as('id', 'رقم الموديول');
                    $crud->columns('id','module');
                    $permissions->access_control($perm, $crud);
                    $output = $crud->render();
                    $output->title = 'الموديولات';
                    $this->load->view('admin/grocery.php', $output);
                } else {
                    $admin->index();
                }
            } catch (Exception $e) {
                show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            }
        } else {
            $admin->index();
        }
    }

}
