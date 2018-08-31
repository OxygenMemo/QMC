<?php

class Workorder_detail_model extends CI_Model
{
    public function getIdWorkorderDetails()
    {
        $this->db->select('workorder_detail_id');
        return $this->db->get('workorder_detail');
    }
}