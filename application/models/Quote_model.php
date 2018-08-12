<?php
class Quote_model extends CI_Model 
{
    public function getQUote_By_customerId($cid)
    {
        $this->db->where('customer_id',$cid);
        return $this->db->get('quote');
    }
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
    public function getQuote_by_date($date)
    {
        $arr = array($date);
        $sql = "SELECT * FROM `quote` inner join `customer` on customer.customer_id = quote.customer_id WHERE quote_date = ? order by `quote_id`";
        return $this->db->query($sql,$arr);
        
    }
    public function getTotal($qid)
    {
        $arr = array($qid);
        $sql = "SELECT ROUND((sum(quality*price_per_unit)*0.07)+sum(quality*price_per_unit),2)as total FROM `product_in_quote` WHERE `quote_id` = ?";
        return $this->db->query($sql,$arr);
    }
    public function updateStatusQuote($status,$qid)
    {
        $arr = array($status,$qid);
        $sql = "UPDATE `quote` SET `quote_status`=? WHERE `quote_id` = ?";
        $this->db->query($sql,$arr);
    }
    public function deleteQuote($qid)
    {
        $this->db->delete('quote', array('quote_id' => $qid));
    }
    public function getQuotes()
    {
        $this->db->join('customer','customer.customer_id = quote.customer_id','left');
        return $this->db->get('quote');
    }
}