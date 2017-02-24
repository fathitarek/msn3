<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of factories_model
 *
 * @author mohamed
 */
class factories_model extends CI_Model {

    public function change_factory_balance($factory_id, $change_balance, $operration) {
        $newbalance = 0;
        $factory = $this->db->get_where('factories', array('factory_id' => $factory_id))->row();
        switch ($operration) {
            case "add":
                $newbalance = ($factory->factory_balance) + $change_balance;
                break;
            case "decrease":
                $newbalance = ($factory->factory_balance) - $change_balance;
                break;
        }
        $data['factory_balance'] = $newbalance;
        $this->db->where('factory_id', $factory_id);
        $this->db->update('factories', $data);
    }

    public function get_factory_data($factory_id) {
        return $this->db->get_where('factories', array('factory_id' => $factory_id))->row();
    }

}
