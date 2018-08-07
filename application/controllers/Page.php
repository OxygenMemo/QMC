<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	/**
	 * Example: DOMPDF 
	 *
	 * Documentation: 
	 * http://code.google.com/p/dompdf/wiki/Usage
	 *
	 */
	public function show_session()
	{
		foreach ($_SESSION as $key => $value) {
			# code...
			echo $key." | ".$value."<br>";
		}
	}
	 //test---------------
	public function gg() {	
		// Load all views as normal
		$this->load->view('welcome_message');
		// Get output html
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('Dompdf_gen');
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->setPaper('A4', 'landscape');

		$this->dompdf->render();
		$this->dompdf->stream("gg.pdf");
		

		
	}
	public function test()
	{
		$this->load->view("request_quote/welcome_message");
	}
	public function save_quote()
	{
		$this->check_login();
		//$this->check_register();
		
		$data['category'] = $_POST['category'];
		$data['product'] = $_POST['product'];
		
		$products_array = array();// array product
		$this->load->model('product_model');
		//----------- create array product and get no product ------
		foreach ($_POST['product'] as $key => $value) {
			array_push($products_array,$this->product_model->getProduct_and_category($value)->result()[0]);
		}
		$data['products'] = $products_array;
		//$this->product_model->getProduct_and_category();
		$data['quantity'] = $_POST['quantity'];

		// ----- cal sub_total -----$sub_total-

		$sub_total =0;
		$i=0;
		foreach ($products_array as $key => $value) {
			$sub_total += $value->product_price * $_POST['quantity'][$i++];
		}
		//echo $sub_total;
		$data['sub_total'] = $sub_total;
		$tex = $sub_total*0.07;
		$data['totel_tex'] = $tex;
		$data['totel'] = $tex+$sub_total;
		$date = DateTime::createFromFormat("Y-m-d",date("Y-m-d"));
		$data['quote_no'] = $this->gen_quote_no($date);
		$data['quote_ref'] = "As inquiry";


		$quote_data = array(
			"quote_no" => $data['quote_no'],
			"quote_date" => $date->format('Y-m-d'),
			"quote_ref" => $data['quote_ref'],
			"customer_id" => $_SESSION['customer_id'],
			"employee_id" => 1,//---------emp bill
			"quote_status" => 0
		);


		//-- insert quote
		$this->load->model('quote_model');
		$this->quote_model->insert_quote($quote_data);
		$quote_id = $this->quote_model->getQuote_by_no($data['quote_no'])->result();
		//echo $quote_id[0];
		//echo json_encode($products_array);
		$this->load->model('product_in_quote_model');
		foreach ($products_array as $key => $value) {
			$product_data = array(
				"quote_id" => $quote_id[0]->quote_id,
				"product_id" => $value->product_id,
				"price_per_unit"=>$value->product_price,
				"quality" => $data['quantity'][$key]
			);	
			$this->product_in_quote_model->insert($product_data);

		}
		
		redirect(base_url()."index.php/page/gen_pdf/".$data['quote_no']);
		
	}
	
	private function gen_quote_no($date)
	{
		//strtotime("+12 Months")

		$quote_no = "MQ";
		$quote_no .=  substr($date->format("Y"),2);
		$quote_no .=  $date->format("m");
		$quote_no .=  $date->format("d");
		$quote_no .= $this->get_runing_number_quote($date->format("Y-m-d"));
		return $quote_no;	
	}
	private function get_runing_number_quote($date){
		$this->load->model('quote_model');
		$quote_no = $this->quote_model->getLast_quote_no($date)->result();
		$num = "0";
		if(!empty($quote_no)){
			$num = substr($quote_no[0]->quote_no,8);
		}
		
		$num = (intval($num)+1)."";
		$num_length = strlen($num);
		if($num_length==1){
			return "00".$num;
		}else if($num_length == 2){
			return "0".$num;
		}else if($num_length == 3){
			return $num;
		}
	}
	public function gen_pdf($q_no=null)
	{
		$this->check_login();

		if($this->check_register()){
			//redirect(base_url()."index.php/page/load_register");	
		};

		//check owner
		
		$this->load->model('quote_model');
		$this->load->model('Product_in_quote_model');

		$quote = $this->quote_model->getQuote_data_one($q_no);
		$quote_id = $this->quote_model->getQuote_by_no($q_no)->result();
		
		$products = $this->Product_in_quote_model->getProductByQuoteId($quote_id[0]->quote_id);
		$data_quote = $quote->result()[0];
		$data['customer_code'] = $data_quote->customer_code;
		$data['customer_company'] = $data_quote->customer_company;
		$data['customer_contact'] = $data_quote->customer_contact;
		$data['customer_branch'] = $data_quote->customer_branch;
		$data['customer_address'] = $data_quote->customer_address;
		$data['customer_postcode'] = $data_quote->customer_postcode;
		$data['customer_texid'] = $data_quote->customer_texid;
		$data['customer_tel'] = $data_quote->customer_tel;
		$data['customer_mobile'] = $data_quote->customer_mobile;
		$data['customer_fax'] = $data_quote->customer_fax;
		$data['customer_email'] = $data_quote->customer_email;
		$data['quote_no'] = $data_quote->quote_no;
		$data['quote_date'] = $data_quote->quote_date;
		$data['quote_ref'] = $data_quote->quote_ref;
		$data['quote_status'] = $data_quote->quote_status;
		$data['employee_name'] = $data_quote->employee_name;
		
		$data['products'] = $products->result();

		/*
		$data['category'] = $_POST['category'];
		$data['product'] = $_POST['product'];
		
		$products_array = array();
		$this->load->model('product_model');
		foreach ($_POST['product'] as $key => $value) {
			array_push($products_array,$this->product_model->getProduct_and_category($value)->result()[0]);
		}
		$data['products'] = $products_array;
		
		//$this->product_model->getProduct_and_category();
		$data['quantity'] = $_POST['quantity'];
		*/
		
		$this->load->view('request_quote/pdf_quote',$data);
        // Get output html
        $html = $this->output->get_output();
        // Load pdf library
        $this->load->library('pdf');
		
        // Load HTML content
        $this->dompdf->load_Html($html);
        
        $this->dompdf->setPaper('A4','portrait');
		$this->dompdf->set_option('isRemoteEnabled', TRUE);
		$this->dompdf->render();
		
        
		$this->dompdf->stream("quote.pdf", array("Attachment"=>0));

		
		exit(0);

	}
	public function test2(){
		$this->load->view('test');
        // Get output html
        $html = $this->output->get_output();
        // Load pdf library
        $this->load->library('pdf');
		
        // Load HTML content
        $this->dompdf->load_Html($html);
        
        $this->dompdf->setPaper('A4','portrait');
		$this->dompdf->set_option('isRemoteEnabled', TRUE);
		$this->dompdf->render();
		
        
		$this->dompdf->stream("quote.pdf", array("Attachment"=>0));

		
		exit(0);
	}
	public function index()
	{
		$this->load_homepage();
	}
	private function send_vertify_email()
	{
		$this->check_login();
		$digits = $_SESSION['digit'];
		$this->load->library('email');

		//SMTP & mail configuration
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'qmcal.th@gmail.com',
			'smtp_pass' => 'x1x2x3x4!',
			'mailtype'  => 'html',
			'charset'   => 'utf-8'
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		//Email content
		$htmlContent = '<h1>Vertify your email</h1>';
		$htmlContent .= "<p>your digit {$digits}</p>";

		$this->email->to($_SESSION['email']);
		$this->email->from('qmcal.th@gmail.com','QMC');
		$this->email->subject('QMC Vertify ');
		$this->email->message($htmlContent);
		
		//Send email
		$this->email->send();

	}
	public function quote_pdf()
	{
		$this->load->view('welcome_message');
	}
	
	public function vertify()//---------------------------------
	{

		$this->check_login();
		$this->check_vertify();
		$this->load->model('customer_model');
		if($this->input->post('digit') == $_SESSION['digit'])
		{
			$result = $this->customer_model->getCustomer($_SESSION['email']);
			if(empty($result->result()))
			{
				//show view register
				$newdata = array('vertify'=> 1);
				$array_items = array('vartify');
				$this->session->set_userdata($newdata);
				$this->session->mark_as_temp($array_items, 3600);
				redirect(base_url()."index.php/page/load_register");
			}else{
				//login success
				$newdata = array('vertify'=> 1);
				$array_items = array('vertify');
				$this->session->set_userdata($newdata);
				$this->session->mark_as_temp($array_items, 3600);
				$this->create_afterLogin_session($_SESSION['email']);
				redirect(base_url()."index.php/page/load_request_quote");

			}

		}else{
			//check vertify
			
			
			redirect(base_url().'index.php/page/load_vertify_email');
		}
	}
	
	public function register()
	{
		if(isset($_POST['submit']))
		{
			
			//$this->check_login();
			//$this->check_register();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('company_name', 'company_name', 'required|max_length[80]');
			$this->form_validation->set_rules('company_code', 'company_code', 'required|max_length[4]');
			$this->form_validation->set_rules('contact', 'contact', 'required|max_length[60]');
			$this->form_validation->set_rules('branch', 'branch', 'required|max_length[50]');
			$this->form_validation->set_rules('address', 'address', 'required|max_length[150]');
			$this->form_validation->set_rules('city_id', 'city_id', 'required');
			$this->form_validation->set_rules('postcode', 'postcode', 'required|max_length[5]');
			$this->form_validation->set_rules('tex_id', 'tex_id', 'required|max_length[12]');
			$this->form_validation->set_rules('tel', 'tel', 'required|max_length[12]');
			$this->form_validation->set_rules('mobile', 'mobile', 'required|max_length[12]');
			$this->form_validation->set_rules('fax', 'fax', 'required|max_length[12]');
			
			if ($this->form_validation->run() == FALSE)
			{
				//$this->form_validation->set_message('Email', 'The {field} field can not be the word "test"');
				$this->load->model('city_model');
				$data['cities'] = $this->city_model->getCities();
				$this->load->view('request_quote/register',$data);
				//$this->load->view('request_quote/register.php');
				
				//redirect(base_url()."index.php/page/load_register");
			}
			else
			{
				$this->load->model('customer_model');
				$this->customer_model->register();
				$this->create_afterLogin_session($_SESSION['email']);
				redirect(base_url()."index.php/page/load_request_quote");

			}
		}else{
			redirect(base_url()."index.php/page/load_register");
		}
	}
	
	//----------- login -----------
	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if ($this->form_validation->run() == FALSE)
		{
			//$this->form_validation->set_message('Email', 'The {field} field can not be the word "test"');
			redirect(base_url()."#quote");
		}
		else
		{
			$this->create_session_login($_POST['email']);
			//$this->load_vertify_email();
			$this->send_vertify_email();
			redirect(base_url()."index.php/page/load_vertify_email");
		}
		
        
	}
	private function create_afterLogin_session($email)
	{
		$this->load->model('customer_model');
		$result = $this->customer_model->getCustomer($email);
		
		foreach ($result->result() as $key => $value) {
			$newdata = array(
				'customer_id'			=> $value->customer_id,
				'customer_company'			=> $value->customer_company,
				'customer_code'     		=> $value->customer_code,
				'customer_contact'     		=> $value->customer_contact,
				'customer_branch'     		=> $value->customer_branch,
				'customer_address'     		=> $value->customer_address,
				'customer_postcode'			=> $value->customer_postcode,
				'customer_texid'     		=> $value->customer_texid,
				'customer_tel'     			=> $value->customer_tel,
				'customer_mobile'   		=> $value->customer_mobile,
				'customer_fax'     			=> $value->customer_fax,
				'customer_email'   			=> $value->customer_email,
				'city_id'     				=> $value->city_id,
				'customer_discount_percent' => $value->customer_discount_percent,
				'logged_in' 				=> TRUE
			);
		}
		$array_items = array(
			'customer_id'				,
			'customer_company'			,
			'customer_code'     		,
			'customer_contact'     		,
			'customer_branch'     		,
			'customer_address'     		,
			'customer_texid'     		,
			'customer_postcode'			,
			'customer_tel'     			,
			'customer_mobile'   		,
			'customer_fax'     			,
			'customer_email'   			,
			'city_id'     				,
			'customer_discount_percent' ,
			'logged_in' 				

			);
		
		$this->session->set_userdata($newdata);
		$this->session->mark_as_temp($array_items, 3600);
	}
	private function create_session_login($email)
	{
		$digits = $this->gen_digit();
		$newdata = array(
			'digit'		=> $digits,
			'email'     => $email,
			'logged_in' => TRUE
		);
		$array_items = array('digit','email','logged_in');
		
		$this->session->set_userdata($newdata);
		$this->session->mark_as_temp($array_items, 3600);

	}
	public function logout(){
		$array_items = array(
			'customer_id'				,
			'customer_company'			,
			'customer_code'     		,
			'customer_contact'     		,
			'customer_branch'     		,
			'customer_address'     		,
			'customer_texid'     		,
			'customer_tel'     			,
			'customer_mobile'   		,
			'customer_fax'     			,
			'customer_email'   			,
			'city_id'     				,
			'customer_discount_percent' ,
			'logged_in' 				,
			'vertify'
			);
		$this->session->unset_userdata($array_items);
	}
	private function check_login()
	{
		if(empty($_SESSION['logged_in']))
		{
			redirect(base_url()."#quote");
		}
	}
	private function check_register(){
		$this->load->model('customer_model');
		
			$result = $this->customer_model->getCustomer($_SESSION['email']);
			if(empty($result->result()))
			{
				//show view register
				return false;
			}else{
				//login success
				//redirect(base_url()."index.php/page/load_request_quote");
				return true;
			}

		
	}
	private function check_vertify()
	{
		if(!empty($_SESSION['vertify']))
		{
			redirect(base_url()."index.php/page/load_request_quote");
		}
	}
	
	//----------- Load view page ------------
	public function load_homepage()
	{
		$this->load->view('request_quote/homepage');
	}
	public function load_vertify_email()
	{
		$this->check_login();
		$this->load->view('request_quote/vertify_email');
	}
	public function load_register()
	{
		$this->check_login();
		if($this->check_register()){
			redirect(base_url()."index.php/page/load_request_quote");
		}
		$this->load->model('city_model');
		$data['cities'] = $this->city_model->getCities();
		$this->load->view('request_quote/register',$data);
	}
	public function load_request_quote()
	{
		$this->check_login();
		//$this->check_register();
		//------
		$this->load->view('request_quote/request_quote.php');
	}
	public function load_profile()
	{
		$this->load->view('request_quote/profile_view');
	}
	public function load_quote_list()
	{
		$this->load->model('quote_model');
		$data['quotes'] = $this->quote_model->getQUote_By_customerId($_SESSION['customer_id'])->result();
		$this->load->view('request_quote/quote_list',$data);
	}
	public function load(){
		$this->load->model('quote_model');
		$data['quotes'] = $this->quote_model->getQUote_By_customerId($_SESSION['customer_id'])->result();
		echo json_encode($data['quotes']);
	}
	//--------------- Algor ------------------
	private function gen_digit()
	{
		$digits = 6;
		return rand(pow(10, $digits-1), pow(10, $digits)-1);
	}
}
