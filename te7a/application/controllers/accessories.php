<?php

class Accessories extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'admin.php';
        include_once 'permissions.php';
    }

    public function accessories_management() {
        $admin = new Admin();
        $permissions  = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 1);
                if ($perm->outer_view == 1) {
                $crud = new grocery_CRUD();
                $crud->set_theme('datatables');
                $crud->set_table('accessories');
                $crud->set_subject('اكسسوار');
                $crud->set_field_upload("image");

                $crud->display_as('Accessorie_name', 'اسم الإكسسوار');
                $crud->display_as('reorder_point', 'نقطة إعادة الطلب');
                $crud->display_as('image', 'الصورة');
                $crud->add_action('شاهد المخزون', '', '', 'ui-icon-image', array($this, 'displayStored'));
                $permissions->access_control($perm, $crud);
                
                $output = $crud->render();
                $output->title = 'الإكسسوارات';
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
    
    
    public function displayStored($primary_key, $row){
        
    }
}
