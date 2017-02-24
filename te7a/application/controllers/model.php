<?php

include_once 'model_repetation.php';

class Model extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'permissions.php';
        include_once 'admin.php';
    }

    public function model_management() {
        $admin = new Admin();
        $permissions = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 4);
                if ($perm->outer_view == 1) {
                    $crud = new grocery_CRUD();
                    $crud->set_theme('datatables');
                    $crud->set_table('model');
                    $crud->set_subject('موديل');

                    $crud->display_as('model_nomber', 'رقم الموديل');
                    $crud->display_as('cost_price', 'سعر التكلفة');
                    $crud->display_as('sale_price', 'سعر البيع');
                    $crud->display_as('model_age', 'العمر المناسب للموديل');
                    $crud->display_as('front_image', 'صورة امامية للموديل');
                    $crud->display_as('back_image', 'صورة خلفية للموديل');
                    $crud->display_as('option_image', 'صورة اختيارية للموديل');
                    $crud->display_as('production_date', 'تاريخ تصنيع الموديل');
                    $crud->display_as('factory_id', 'المصنع المنتج لهذا الموديل');

                    $crud->add_action('تفاصيل انتاج الموديل', '', '', 'ui-icon-image', array($this, 'get_model_repetation'));

                    $crud->columns('model_nomber', 'sale_price', 'model_age', 'production_date', 'front_image');
                    $crud->set_relation('factory_id', 'factories', 'factory_name');
                    $crud->set_relation('model_age', 'ages', 'age_name');

                    $crud->set_field_upload('front_image');
                    $crud->set_field_upload('back_image');
                    $crud->set_field_upload('option_image');

                    $permissions->access_control($perm, $crud);
                    $output = $crud->render();
                    $output->title = 'الموديلات';
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

    public function get_model_repetation($primary_key, $row) {
        return site_url('model_repetation/model_repetation_management/' . $primary_key . '/' . $this->session->userdata('id'));
    }

}
