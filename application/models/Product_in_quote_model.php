<?php
class Product_in_quote_model extends CI_Model {

    public function insert($arr)
    {
        $this->db->insert('product_in_quote',$arr);
    }
    public function getProductByQuoteId($qid)
    {
        $arr = array($qid);
        $sql = "SELECT *,(`price_per_unit`*`quality`)as `amount` FROM `product_in_quote` as pq
        left join `product` as p ON p.product_id = pq.product_id
        left join `product_category` as c ON p.product_category_Id = c.product_category_id
        WHERE pq.quote_id = ? ";
    
        return $this->db->query($sql,$arr);
    }


}

?>