<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
    
   public function product_json()
   {
    header('Content-Type: application/json');
        $this->load->model('product_category_model');
            
        $categories = new obj;
        $categories->categories = $this->product_category_model->getProductCategories()->result();
        $this->load->model('product_model');
        foreach ($categories->categories as $i => $value) {
            
            //foreach ($arr as $j => $value) {
                $categories->categories[$i]->products = $this->product_model->getProduct_in_category($value->product_category_id)->result();
            //}
        }
        echo json_encode($categories);
   }
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
    public function getQuoteLimit($page)
    {
        header('Content-Type: application/json');
        $this->load->model("quote_model");
        $result = $this->quote_model->getQuoteLimitPage($page*10,10,2)->result();
        echo json_encode($result);
    }
    public function getNumQuote()
    {
        header('Content-Type: application/json');
        $this->load->model("quote_model");
        $result = $this->quote_model->getNumQuote()->result();
        //echo json_encode($result);
        $page = ceil($result[0]->numquote/10);
        echo $page;

        
        
    }
//SELECT * FROM quote ORDER BY quote_id desc LIMIT 5,10 ;
}
class obj{

}
?>
