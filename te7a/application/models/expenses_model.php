<?php

class expenses_model extends CI_Model {

    public function edit_factory($primary_key, $factoryId) {
        $this->db->where('Expenses_id', $primary_key);
        $data = array('factory_id' => $factoryId);
        $this->db->update('expenses', $data); 
    }

}
