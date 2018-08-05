<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
    public function product_catagories()
	{
        header("Access-Control-Allow-Origin: *");
		$this->load->model('product_category_model');
		$result = $this->product_category_model->getProductCategories();
		echo json_encode($result->result());
	}
	public function product_in_catagories($id_cate=null)
	{
        header("Access-Control-Allow-Origin: *");
        $this->load->model('product_model');
        if(!empty($id_cate))
        {
            $result = $this->product_model->getProduct_in_category($id_cate);
            echo json_encode($result->result());
        }
        else
        {
            echo null;
        }
        
    }
    public function getPriceProduct($product_id = null)
    {
        header("Access-Control-Allow-Origin: *");
        $this->load->model('product_model');
        if(!empty($product_id))
        {
            $result = $this->product_model->getPriceProduct($product_id);
            echo json_encode($result->result());
        }
        else
        {
            echo null;
        }
    }

}
?>