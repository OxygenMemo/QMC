<?php
class Quote_model extends CI_Model 
{
    public function getQUote_By_customerId($cid)
    {
        $this->db->where('customer_id',$cid);
        $this->db->join('recive','recive.quote_id = quote.quote_id','left');
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
        $sql = "SELECT *,sum(w.workorder_status) total_workorder_status,quote.quote_id FROM `quote`
         left join `customer` on customer.customer_id = quote.customer_id 
         left join `workorder` as w on w.quote_id = quote.quote_id 
        WHERE quote_date = ? GROUP BY quote.quote_id" ;
        //$this->db->order_by("quote.quote_id", "desc");
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
        $this->db->order_by("quote.quote_id", "desc");
        return $this->db->get('quote');
    }
    public function getQuotes_by_status2($page,$limit,$status)
    {
        $arr = array($status,$page,$limit);
        $sql ="SELECT *,quote.quote_id,sum(workorder.workorder_status) total_workorder_status FROM quote
            left join customer  on customer.customer_id = quote.customer_id
            left join workorder on workorder.quote_id = quote.quote_id
            where quote.quote_status = ? group by quote.quote_id ORDER BY quote.quote_id desc LIMIT ?,? ";
        return $this->db->query($sql,$arr);
    }
    public function getQuotes_by_status2_emp($page,$limit,$status,$empid)
    {
        $arr = array($status,$empid,$page,$limit);
        $sql ="SELECT *,quote.quote_id FROM quote
            left join customer  on customer.customer_id = quote.customer_id
            left join workorder on workorder.quote_id = quote.quote_id
            left join workorder_detail on workorder.workorder_detail_id = workorder_detail.workorder_detail_id
            where quote.quote_status = ? and workorder.employee_id = ? and workorder.workorder_status = 0 ORDER BY quote.quote_id desc LIMIT ?,? ";
        return $this->db->query($sql,$arr);
    }
    public function getQuotes_by_status($status)
    {
        $this->db->select('*,quote.quote_id,sum(workorder.workorder_status) total_workorder_status');
        $this->db->where("quote_status",$status);

        $this->db->join('customer','customer.customer_id = quote.customer_id','left');
        $this->db->join('workorder','quote.quote_id = workorder.quote_id','left');
        $this->db->group_by('quote.quote_id');
        $this->db->order_by("quote.quote_id", "desc");
        
        return $this->db->get('quote');
    }
    public function search($word){
        
        $data = array("%".$word.'%','%'.$word.'%');
        $sql = "SELECT *,quote.quote_id,sum(workorder.workorder_status) total_workorder_status FROM `quote`
        LEFT JOIN customer on customer.customer_id = quote.customer_id
        LEFT JOIN workorder on quote.quote_id = workorder.quote_id
        WHERE quote.quote_no LIKE ? OR customer.customer_company LIKE ?
        GROUP BY quote.quote_id Limit 25";
        return $this->db->query($sql,$data);
    }
    public function getQuoteLimitPage($page,$limit,$status)
    {//SELECT * FROM quote ORDER BY quote_id desc LIMIT 5,10 ;
        $arr = array($status,$page,$limit);
        $sql ="SELECT * FROM quote
            left join customer  on customer.customer_id = quote.customer_id
            left join workorder on workorder.quote_id = quote.quote_id
            where quote.quote_status = ? group by quote.quote_id ORDER BY quote.quote_id desc LIMIT ?,? ";
        return $this->db->query($sql,$arr);

    }
    public function getNumQuote($status)
    {
        $arr = array($status);
        $sql = "SELECT COUNT(`quote_id`) as numquote FROM `quote` where quote_status = ?";
        return $this->db->query($sql,$arr);
    }
}