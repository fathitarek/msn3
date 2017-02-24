<?php

class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'admin.php';
        include_once 'permissions.php';
    }

    public function employee_management() {
        $admin = new Admin();
        $permissions  = new permissions();
        if ($admin->checkLogin()) {
            try {
                $perm = $permissions->getUserPermissions($this->session->userdata('id'), 13);
                if ($perm->outer_view == 1) {
                $crud = new grocery_CRUD();
                $crud->set_theme('datatables');
                $crud->set_table('employee');
                $crud->set_subject('موظف');

                $crud->display_as('f_name', 'الاسم الاول');
                $crud->display_as('nick_name', 'اسم الشهرة');
                $crud->display_as('m_name', 'الاسم الثاني');
                $crud->display_as('l_name', 'الاسم الاخير');
                $crud->display_as('address', 'العنوان');
                $crud->display_as('mobile', 'الهاتف');
                $crud->display_as('job', 'الوظيفة');
                $crud->display_as('salary', 'الراتب');
                $crud->display_as('last_increment_date', 'تاريخ اخر زيادة في المرتب');
                $crud->display_as('last_increment_amount', 'قيمة اخر زيادة في المرتب');
                $crud->display_as('ssid_front_image', 'صورةامامية للبطاقة');
                $crud->display_as('ssid_back_image', 'صورة خلفية للبطاقة');
                $crud->display_as('active', 'يعمل حاليا في المصنع؟');
                $crud->display_as('start_date', 'تاريخ بداية العمل');
                $crud->display_as('factory_id', 'تابع لمصنع');
                $crud->display_as('ssid', 'رقم البطاقة');
                $crud->display_as('image','الصورة');
                $crud->display_as('birthdate','تاريخ الميلاد');
                $crud->display_as('fingerprint_code','كود جهاز البصمة');
                $crud->set_field_upload('ssid_front_image');
                $crud->set_field_upload('ssid_back_image');
                $crud->set_field_upload('image');
                $crud->set_relation('job','roles','role_name');
                $crud->set_relation('factory_id','factories','factory_name');
                $crud->fields('f_name','m_name','l_name','nick_name','address','birthdate','ssid','image','mobile','job','salary','start_date','last_increment_date','last_increment_amount','ssid_front_image','ssid_back_image','factory_id','fingerprint_code','active');
                $crud->columns('f_name','m_name','l_name','nick_name','image','mobile','job','active','fingerprint_code','factory_id');
                $permissions->access_control($perm, $crud);
                
                $output = $crud->render();
                $output->title = 'الموظفين';
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

}
