<?php

class Workorder_model extends CI_Model
{
    public function getWorkorder_by_quoteNo($qid)
    {
        $this->db->where('quote_id',$qid);
        $this->db->join('workorder_detail','workorder_detail.workorder_detail_id = workorder.workorder_detail_id','inner');
        return $this->db->get('workorder');
    }
}