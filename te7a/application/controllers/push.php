<?php

class Push extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'admin.php';
        include_once 'permissions.php';
    }

    public function push_management() {
        $admin = new Admin();
        $permissions = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 11);
                if ($perm->outer_view == 1) {
                    $crud = new grocery_CRUD();
                    $crud->set_theme('datatables');
                    $crud->set_table('factory_push');
                    $crud->set_subject('سلف المصانع');

                    $crud->display_as('balance', 'قيمة السلفة');
                    $crud->display_as('push_date', 'تاريخ السلفة');
                    $crud->display_as('push_maker', 'من الذي قام بدفع السلفة؟');
                    $crud->display_as('factory_id', 'المصنع المنقول اليه السلفة');
                    $crud->display_as('accepted', 'هل استلمت هذا المبلغ المالي؟');

                    if ($this->session->userdata('role_id') != 1 || $this->session->userdata('factory_id') == 1) {
                        $crud->unset_edit_fields('accepted');
                    }
                    $crud->set_relation('factory_id', 'factories', 'factory_name', array('factories.factory_id >' => '1'));

                    $permissions->access_control($perm, $crud);

                    $output = $crud->render();
                    $output->title = 'سلف المصانع';
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
