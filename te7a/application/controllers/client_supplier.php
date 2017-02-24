<?php

class client_supplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'admin.php';
        include_once 'permissions.php';
    }

    public function cs_management() {
        $admin = new Admin();
        $permissions = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 6);
                if ($perm->outer_view == 1) {
                    $crud = new grocery_CRUD();
                    $crud->set_theme('datatables');
                    $crud->set_table('client_supplier');
                    $crud->set_subject('عميل/مورد');

                    $crud->set_rules('email', 'الإيميل', 'valid_email');
                    $crud->display_as('client_name', 'اسم العميل / المورد');
                    $crud->display_as('client_office_name', 'اسم المكتب / الشركة / المصنع');
                    $crud->display_as('client_address', 'العنوان');
                    $crud->display_as('client_phone', 'الهاتف الارضي');
                    $crud->display_as('client_mobile', 'الهاتف الجوال');
                    $crud->display_as('type_id', 'الحالة');
                    $crud->display_as('email', 'البريد الإلكتروني');

                    $crud->set_relation('type_id', 'client_type', 'type_name');

                    $crud->required_fields(array('client_name',
                        'client_office_name',
                        'client_address',
                        'client_phone',
                        'client_mobile',
                        'type_id',
                        'email'));
                    $permissions->access_control($perm, $crud);

                    $output = $crud->render();
                    $output->title = 'العملاء / الموردين';
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
