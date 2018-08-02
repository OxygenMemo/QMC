<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	/**
	 * Example: DOMPDF 
	 *
	 * Documentation: 
	 * http://code.google.com/p/dompdf/wiki/Usage
	 *
	 */
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
	public function dd(){
		$this->load->view('welcome_message');
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
		
		$this->dompdf->set_option('isRemoteEnabled', TRUE);
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
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
	public function path()
	{
		echo dirname(__FILE__);
	}
	public function vertify()//---------------------------------
	{
		$this->check_login();
		$this->load->model('customer_model');
		if($this->input->post('digit') == $_SESSION['digit'])
		{
			$result = $this->customer_model->check_email($_SESSION['email']);
			if(empty($result->result()))
			{
				//show view register
				redirect(base_url()."index.php/page/load_register");
			}else{
				//login success
				echo "login success";
			}

		}
	}
	
	public function register()
	{

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
		$array_items = array('digit','email','logged_in');
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
		
			$result = $this->customer_model->check_email($_SESSION['email']);
			if(empty($result->result()))
			{
				//show view register
				
			}else{
				//login success
				echo "login success";
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
		$this->check_register();
		$this->load->model('city_model');
		$data['cities'] = $this->city_model->getCities();
		$this->load->view('request_quote/register',$data);
	}
	//--------------- Algor ------------------
	private function gen_digit()
	{
		$digits = 6;
		return rand(pow(10, $digits-1), pow(10, $digits)-1);
	}
}
