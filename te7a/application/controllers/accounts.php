<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of accounts
 *
 * @author mohamed
 */
class Accounts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'permissions.php';
        include_once 'admin.php';
    }

    public function accounts_management() {
        $admin = new Admin();
        $permissions = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 5);
                if ($perm->outer_view == 1) {
                    $crud = new grocery_CRUD();
                    $crud->set_theme('datatables');
                    $crud->set_table('accounts');
                    $crud->set_subject('حساب');

                    $crud->set_relation('role_id', 'roles', 'role_name');
                    $crud->set_relation('factory_id', 'factories', 'factory_name');

                    $crud->display_as('fullname', 'الإسم بالكامل');
                    $crud->display_as('phone', 'الهاتف');
                    $crud->display_as('username', 'اسم الدخول');
                    $crud->display_as('password', 'رمز المرور');
                    $crud->display_as('role_id', 'الدور الوظيفي');
                    $crud->display_as('image', 'الصورة');
                    $crud->display_as('factory_id', 'تابع لمصنع');

                    $crud->set_field_upload("image");

                    $crud->columns('fullname', 'phone', 'role_id', 'image', 'factory_id');
                    
                    $permissions->access_control($perm, $crud);
                    
                    $output = $crud->render();
                    $output->title = 'حسابات الدخول';
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

}
