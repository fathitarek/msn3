<?php

class model_repetation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'permissions.php';
        include_once 'admin.php';
    }

    public function model_repetation_management($primary_key,$id) {
        $admin = new Admin();
        $permissions = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($id, 4);
                if ($perm->outer_view == 1) {
                    $crud = new grocery_CRUD();
                    $crud->set_theme('datatables');
                    $crud->set_table('model_repetation');
                    $crud->set_subject('انتاج الموديل');
                    $crud->where('model_repetation.model_id', $primary_key);
                    $crud->set_relation('model_id', 'model', 'model_nomber');

                    $crud->display_as('model_id', 'رقم الموديل');
                    $crud->display_as('note_count', 'العدد في كشكول القص');
                    $crud->display_as('defects_no', 'عدد التيشرتات الغير سليمة');
                    $crud->display_as('delivered_no', 'ما تم تسليمه');

                    $output = $crud->render();
                    $output->title = 'تفاصيل انتاج الموديلات';
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
