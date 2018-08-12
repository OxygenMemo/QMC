<?php
class Emp_branch_model extends CI_Model
{
    public function getBranchs()
    {
        return $this->db->get('emp_branch');
    }
    public function getLastId()
    {
        $this->db->select('emp_branch_id');
        $this->db->limit(1);
        $this->db->order_by("emp_branch_id desc");
        return $this->db->get('emp_branch');
    }
}