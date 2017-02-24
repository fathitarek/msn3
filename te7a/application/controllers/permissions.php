<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of permissions
 *
 * @author mohamed
 */
class permissions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        include_once 'admin.php';
        $this->load->model('permissions_model');
    }

    public function permissions_management() {
        $admin = new Admin();
        if ($admin->checkLogin()) {
            try {
                $permissions = $this->getUserPermissions($this->session->userdata('id'), 3);
                if ($permissions->outer_view == 1) {
                    $crud = new grocery_CRUD();
                    $crud->set_theme('datatables');
                    $crud->set_table('permissions');
                    $crud->set_subject('تصريح');

                    $crud->display_as('module', 'موديول');
                    $crud->display_as('admin_id', 'الحساب');
                    $crud->display_as('view', 'المشاهدة');
                    $crud->display_as('add', 'الإضافة');
                    $crud->display_as('edit', 'التعديل');
                    $crud->display_as('delete', 'الحذف');
                    $crud->display_as('outer_view', 'مشاهدة الجدول من الخارج');
                    $crud->display_as('print', 'طباعة');
                    $crud->display_as('export', 'استخراج');

                    $crud->fields('module', 'admin_id', 'view', 'add', 'edit', 'delete', 'outer_view', 'print', 'export');
                    $crud->required_fields('module', 'admin_id', 'view', 'add', 'edit', 'delete', 'outer_view', 'print', 'export');
                    if ($permissions->add == 0) {
                        $crud->unset_add();
                    }
                    $crud->set_relation('admin_id', 'accounts', 'fullname');
                    $crud->set_relation('module', 'modules', 'module');
                    $output = $crud->render();
                    $output->title = 'التصاريح';
                    $output->state = $crud->getState();
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

    public function getUserPermissions($admin_id, $module) {
        return $this->permissions_model->getUserPermission($admin_id, $module)->row();
    }

    public function access_control($perm, $crud) {
        if ($perm->view == 0) {
            $crud->unset_read();
        }

        if ($perm->add == 0) {
            $crud->unset_add();
        }

        if ($perm->edit == 0) {
            $crud->unset_edit();
        }

        if ($perm->delete == 0) {
            $crud->unset_delete();
        }

        if ($perm->print == 0) {
            $crud->unset_print();
        }

        if ($perm->export == 0) {
            $crud->unset_export();
        }
    }

    public function getAllPermitted($userId) {
        return $this->permissions_model->getAllPermitted($userId);
    }

}
