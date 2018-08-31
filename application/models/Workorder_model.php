<?php

class Workorder_model extends CI_Model
{
    public function getWorkorder_by_quoteNo($qid)
    {
        $this->db->where('quote_id',$qid);
        $this->db->join('workorder_detail','workorder_detail.workorder_detail_id = workorder.workorder_detail_id','inner');
        $this->db->join('employee','workorder.employee_id = employee.employee_id','left');
        
        return $this->db->get('workorder');
    }
    public function insert_workorder($arr)
    {
        $this->db->insert('workorder',$arr);
    }
    public function update_status($woid,$status)
    {
        $this->db->set('workorder_status', $status);
        $this->db->where('workorder_id', $woid);
        $this->db->update('workorder');
    }
    public function update_emp($woid,$empid){
        $this->db->set('employee_id',$empid);
        $this->db->where('workorder_id',$woid);
        $this->db->update('workorder');
    }
    public function update_status_emp($eid,$woid,$status)
    {
        $this->db->set('workorder_status', $status);
        //$this->db->set('workorder_status', $status);
        $this->db->where('workorder_id', $woid);
        $this->db->where('employee_id', $eid);
        
        $this->db->update('workorder');
    }
    
}