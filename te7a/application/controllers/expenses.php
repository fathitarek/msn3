<?php

class expenses extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'admin.php';
        include_once 'permissions.php';
        $this->load->model('expenses_model');
        $this->load->model('factories_model');
    }

    public function expenses_management() {
        $admin = new Admin();
        $permissions = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 9);
                if ($perm->outer_view == 1) {
                    $crud = new grocery_CRUD();
                    $crud->set_theme('datatables');
                    $crud->set_table('expenses');
                    $crud->set_subject('بيان');
                    $crud->where('expenses.factory_id', $this->session->userdata('factory_id'));
                    $crud->order_by('Expenses_id', 'desc');
                    $crud->set_relation('type_id', 'expenses_types', 'type_name');
                    $crud->set_relation('factory_id', 'factories', 'factory_name');

                    
                    $crud->display_as('Expenses_text', 'تفاصيل البيان');
                    $crud->display_as('AmountOfMony', 'المبلغ');
                    $crud->display_as('type_id', 'نوع البيان');
                    $crud->display_as('Expenses_date', 'تاريخ البيان');
                    $crud->display_as('factory_id', 'مصنع');
                    
                    $crud->columns('Expenses_text', 'AmountOfMony', 'type_id', 'Expenses_date');
                    $crud->fields('Expenses_text', 'AmountOfMony', 'type_id');
                    
                    $factory_data = $this->factories_model->get_factory_data($this->session->userdata('factory_id'));
                    $crud->set_rules('AmountOfMony','المبلغ','less_than['.$factory_data->factory_balance.']');
                    
                    $crud->callback_after_insert(array($this, 'recordFactory'));                    
                    
                    $permissions->access_control($perm, $crud);

                    $output = $crud->render();
                    $output->title = 'دفتر اليومية';
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

    public function recordFactory($post_array, $primary_key) {
        //هنا انا ضيفت رقم المصنع اللي سجل المصروفات
        $this->expenses_model->edit_factory($primary_key, $this->session->userdata('factory_id'));
        $this->factories_model->change_factory_balance( $this->session->userdata('factory_id'), $post_array['AmountOfMony'],'decrease');
    }

}
