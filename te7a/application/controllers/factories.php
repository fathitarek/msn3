<?php

class factories extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'admin.php';
        include_once 'permissions.php';
        $this->load->model('expenses_model');
    }

    public function factories_management() {
        $admin = new Admin();
        $permissions = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 10);
                if ($perm->outer_view == 1) {
                    $crud = new grocery_CRUD();
                    $crud->set_theme('datatables');
                    $crud->set_table('factories');
                    $crud->set_subject('مصنع');

                    $crud->display_as('factory_name', 'اسم المصنع');
                    $crud->display_as('factory_owner', 'اسم صاحب المصنع');
                    $crud->display_as('factory_phone', 'تليفون المصنع');
                    $crud->display_as('factory_mobile', 'موبايل المصنع');
                    $crud->display_as('factory_balance', 'رصيد المصنع المتبقي');

                    $fields_columns = array('factory_name', 'factory_owner', 'factory_mobile', 'factory_phone');
                    $crud->columns($fields_columns);
                    $crud->fields($fields_columns);

                    $crud->unset_fields('factory_balance');

                    $permissions->access_control($perm, $crud);

                    $output = $crud->render();
                    $output->title = 'المصانع';

                    $this->load->view('admin/grocery.php', $output);
                } else {
                    $admin->adminPanel();
                }
            } catch (Exception $e) {
                show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            }
        } else {
            $admin->index();
        }
    }

    public function recordFactory() {
        
    }

    public function increase_factory_balance() {
        
    }

}
