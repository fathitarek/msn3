<?php

class Po extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('grocery_CRUD');
    }

    public function Po_management() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('purchase_order');
            $crud->set_subject('امر توريد');

            $crud->display_as('purchase_date', 'تاريخ الامر');
            $crud->display_as('supplier_id', 'المورد');
            $crud->display_as('po_type', 'نوع امر التوريد');

            $crud->set_relation('supplier_id', 'client_supplier', 'client_name');
            $crud->set_relation('po_type', 'purchase_order_type', 'type_name');

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
