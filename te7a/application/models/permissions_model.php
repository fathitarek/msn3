<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of permissions_model
 *
 * @author mohamed
 */
class permissions_model extends CI_Model {

    public function getUserPermission($admin_id, $module) {
        return $this->db->get_where('permissions', array('module' => $module, 'admin_id' => $admin_id));
    }

    public function getAllPermitted($userId) {
        $this->db->where(array('admin_id' => $userId, 'outer_view' => 1));
        return $this->db->get('permissions');
    }

}
