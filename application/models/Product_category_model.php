<?php
class Product_category_model extends CI_Model 
{
    public function getProductCategories(){
        return $this->db->get('product_category');
    }
}