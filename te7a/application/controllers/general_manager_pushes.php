<?php

class General_manager_pushes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'admin.php';
        include_once 'permissions.php';
    }

    public function general_manager_pushes_management() {
        $admin = new Admin();
        $permissions  = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 12);
                if ($perm->outer_view == 1) {
                $crud = new grocery_CRUD();
                $crud->set_theme('datatables');
                $crud->set_table('general_manager_pushes');
                $crud->set_subject('دفعة للمصنع الرئيسي');

                $crud->display_as('balance', 'المبلغ المحول للمصنع الرئيسي');
                $crud->display_as('push_date', 'تاريخ نقل المبلغ');
                $crud->unset_add_fields('push_date');
                $permissions->access_control($perm, $crud);
                
                $crud->callback_after_insert(array('factories', 'increase_factory_balance'));
                $output = $crud->render();
                $output->title = 'دفعات المصنع الرئيسي';
                $this->load->view('admin/grocery.php', $output);
                }else{
                    $admin->adminPanel();
                }
            } catch (Exception $e) {
                show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            }
        } else {
            $admin->index();
        }
    }
    
    

}
