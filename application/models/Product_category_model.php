<?php
class Product_category_model extends CI_Model 
{
    public function getProductCategories(){
        return $this->db->get('product_category');
    }
    public function getProductCategorie($cid){
        $this->db->where('product_category_id',$cid);
        $this->db->limit(1);
        return $this->db->get('product_category');
    }
}