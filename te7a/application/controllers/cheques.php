<?php

class Cheques extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'admin.php';
        include_once 'permissions.php';
    }

    public function cheques_management() {
        $admin = new Admin();
        $permissions = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 2);
                if ($perm->outer_view == 1) {
                    $crud = new grocery_CRUD();
                    $crud->set_theme('datatables');
                    $crud->set_table('cheques');
                    $crud->set_subject('شيك بنكي');

                    $crud->display_as('Cheque_value', 'قيمة الشيك');
                    $crud->display_as('Cheque_payment_date', 'موعد استحقاق الدفع');
                    $crud->display_as('client_account_number', 'رقم حساب العميل');
                    $crud->display_as('Cheque_Issuance_date', 'تاريخ توقيع الشيك');
                    $crud->display_as('cheque_type', 'هل الشيك داخل؟');
                    $crud->display_as('client_id', 'اسم العميل');
                    $crud->display_as('done', 'تم صرفه');

                    $crud->set_relation('client_id', 'client_supplier', 'client_name');

                    $permissions->access_control($perm, $crud);

                    $output = $crud->render();
                    $output->title = 'الشيكات البنكية';
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
