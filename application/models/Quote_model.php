<?php
class Quote_model extends CI_Model 
{
    public function getLast_quote_no($date)
    {
        $arr = array($date);
        $sql = "SELECT `quote_id`,`quote_no` FROM `quote` WHERE quote_date = ? order by `quote_id` desc limit 1";

        return $this->db->query($sql,$arr);
    }
    public function insert_quote($arr)
    {
        $this->db->insert('quote',$arr);
    }
    public function getQuote_by_no($qno)
    {
        $this->db->select('quote_id');
        $this->db->where('quote_no',$qno);
        $this->db->limit(1);
        return $this->db->get('quote');
    }
    public function getQuote_data_one($quote_no)
    {
        $this->db->select('*');
        $this->db->join('customer','customer.customer_id = quote.customer_id','left');
        $this->db->join('employee','employee.employee_id = quote.employee_id','left');
        $this->db->where('quote.quote_no',$quote_no);
        $this->db->limit(1);
        return $this->db->get('quote');
    }
}