<?php

class colors extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function colors_management() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('colors');
            $crud->set_subject('لون');
            $crud->display_as('color_name', 'اسم اللون');
            $this->load->view('example.php', $crud->render());
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

}
