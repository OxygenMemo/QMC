<?
class Recive_model extends CI_Model
{
    public function insert($arr)
    {
        $this->db->insert('recive',$arr);

    }
    public function getRecieve($qid)
    {
        $this->db->where('recive.quote_id',$qid);
        $this->db->join('quote','quote.quote_id = recive.quote_id','left');
        $this->db->join('customer','customer.customer_id = quote.customer_id','left');
        $this->db->limit(1);
        return $this->db->get('recive');
    }
}