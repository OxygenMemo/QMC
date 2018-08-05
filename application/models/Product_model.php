<?php
class Product_model extends CI_Model
{
    public function getProduct_in_category($id_cate)
    {
        $this->db->where('product.product_category_id',$id_cate);
        $this->db->join('product_category', 'product_category.product_category_id = product.product_category_id', 'left');
        return $this->db->get('product');
    }
    public function getPriceProduct($id_product)
    {
        $this->db->select('product_price');
        $this->db->where("product_id",$id_product);
        $this->db->limit(1);
        return $this->db->get('product');
    }
    public function getProduct_and_category($Pid){
        $this->db->where('product_id',$Pid);
        $this->db->join('product_category', 'product_category.product_category_id = product.product_category_id', 'left');
        $this->db->limit(1);
        return $this->db->get('product');
    }
}