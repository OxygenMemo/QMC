<?php
class Product_model extends CI_Model
{
    public function getProduct_in_category($id_cate)
    {
        $this->db->where('product.product_category_id',$id_cate);
        $this->db->where('product.product_status',0);
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
    public function getProducts()
    {
        $this->db->join('product_category', 'product_category.product_category_id = product.product_category_id', 'left');
        return $this->db->get('product');
    }
    public function getProduct($pid)
    {
        $this->db->where("product.product_id",$pid);
        $this->db->join('product_category', 'product_category.product_category_id = product.product_category_id', 'left');
        $this->db->limit(1);
        return $this->db->get('product');
    }
    public function getProducts_by_category($cid)
    {
        $this->db->where('product_category_id',$cid)
                ->where('product_status != ',1);;
        return $this->db->get('product');
    }
    public function change_status($pid,$status)
    {
        $this->db->set('product_status', $status);
        $this->db->where('product_id', $pid);
        $this->db->update('product');
    }
    public function insert($arr)
    {
         $this->db->insert('product',$arr);
    }
    public function getLastId_cate($cid)
    {
        $arr = array($cid);
        $sql = "SELECT `product_no` FROM `product` WHERE `product_category_id` = ? ORDER BY `product_no` DESC LIMIT 1";
        return $this->db->query($sql,$cid);
    }
    public function update($pid,$name,$price)
    {
        $this->db->set('product_name', $name);
        $this->db->set('product_price', $price);
        $this->db->where('product_id', $pid);
        $this->db->update('product');
    }
    
}
