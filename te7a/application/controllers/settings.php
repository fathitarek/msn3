<?php

class settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'admin.php';
        include_once 'permissions.php';
    }

    public function index() {
        include_once 'homePage.php';
        $home = new homePage();
        $home->index();
    }

    public function settings_management() {
        $admin = new Admin();
        $permissions = new permissions();
        if ($admin->checkLogin() == 1) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 8);
                if ($perm->outer_view == 1) {
                    $crud = new grocery_CRUD();
                    $crud->set_theme('datatables');
                    $crud->set_table('settings');

                    $crud->display_as('address', 'العنوان');
                    $crud->display_as('phone', 'الهاتف الأرضي');
                    $crud->display_as('mob1', 'موبايل 1');
                    $crud->display_as('mob2', 'موبيل 2');
                    $crud->display_as('facebook', 'الفيس بوك');
                    $crud->display_as('email', 'البريد الإلكتروني');

                    $permissions->access_control($perm, $crud);

                    $output = $crud->render();
                    $output->title = 'الإعدادات الرئيسية للموقع';
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
