<?php

class Invoice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('grocery_CRUD');
    }

    public function invoice_management() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('invoice');
            $crud->set_subject('فاتورة');

            $crud->display_as('invoice_type', 'نوع الفاتورة');
            $crud->display_as('invoice_date', 'تاريخ الفاتورة');
            $crud->display_as('client_id', 'اسم العميل / المورد');
            $crud->display_as('total', 'إجمالي الفاتورة');
            
            $crud->set_relation('client_id','client_supplier','client_name');
            $crud->set_relation('invoice_type','invoice_type','type_name');            
            $crud->columns('invoice_type','invoice_date','client_id','total');
            $crud->fields('invoice_type','client_id','total');
            
            $crud->unset_read();
            $crud->unset_delete();
            $crud->unset_add();
            $crud->unset_edit();
            
            $this->load->view('example.php', $crud->render());
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
}
