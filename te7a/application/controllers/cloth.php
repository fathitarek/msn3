<?php

class cloth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'admin.php';
        include_once 'permissions.php';
    }

    public function cloth_management() {
        $admin = new Admin();
        $permissions = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 7);
                if ($perm->outer_view == 1) {
                    $crud = new grocery_CRUD();
                    $crud->set_theme('datatables');
                    $crud->set_table('cloth');
                    $crud->set_subject('نوع قماش');

                    $crud->display_as('cloth_name', 'اسم نوع القماش');
                    $crud->display_as('reorder_point', 'نقطة اعادة الطلب');
                    $crud->display_as('cloth_season_id', 'موسم استخدام القماش');
                    $crud->display_as('cloth_class', 'فئة القماش');
                    
                    $crud->add_action('تفاصيل المخزون', '', '', 'ui-icon-image', array($this, 'display_stored_quantity'));
                    
                    $crud->set_relation('cloth_season_id', 'cloth_season', 'season_name');

                    $permissions->access_control($perm, $crud);

                    $output = $crud->render();
                    $output->title = 'القماش';
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

    /**
     * this method for displaying every cloth type quantity in each store
     * @param type primary key for cloth type we want to know it's quantity
     * @param type details of this cloth type
     */
    public function display_stored_quantity($primary_key, $row){
        return site_url('cloth/displayQuantity/'.$primary_key);
    }
    
    
    public function displayQuantity($primary_key){
        $admin = new Admin();
        $permissions = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 7);
                if ($perm->outer_view == 1) {
                    $crud = new grocery_CRUD();
                    $crud->set_theme('datatables');
                    $crud->set_table('cloth_store_client');                    
                    $crud->where('cloth_store_client.cloth_id',$primary_key);
                    
                    $crud->display_as('cloth_id','نوع القماش');
                    $crud->display_as('price','سعر الإستلام');
                    $crud->display_as('store_id','مخزن');
                    $crud->display_as('weight','الوزن');                                        
                    $crud->display_as('Gown_count','عدد الاتواب');
                    $crud->display_as('color','اللون');
                    $crud->display_as('batch_no','رقم الحوض');
                    $crud->display_as('client_id','المورد');
                    $crud->display_as('invoice_id','رقم اذن الاستلام');
                    
                    $crud->set_relation('store_id', 'store', 'store_name');
                    $crud->set_relation('color', 'colors', 'color_name');
                    $crud->set_relation('cloth_id', 'cloth', 'cloth_name');
                    $crud->set_relation('client_id', 'client_supplier', 'client_name');
                    
                    $crud->unset_add();
                    $crud->unset_edit();
                    $crud->unset_delete();

                    $output = $crud->render();
                    $output->title = 'القماش';
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
