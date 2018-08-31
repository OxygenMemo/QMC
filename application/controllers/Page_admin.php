<?php
class Page_admin extends CI_Controller 
{
    public function index()
    {
        redirect(base_url().'index.php/page_admin/login');
    }
    public function login()
    {
        if($this->input->post("btn_login") == null)//---- not submit
        {
            $this->load->view('page_admin/login');
        }
        else //-- have button submit
        {
            $this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'username', 'required|max_length[20]');
			$this->form_validation->set_rules('password', 'password', 'required|max_length[20]');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('page_admin/login');
				
			}
			else
			{
                $this->load->model("employee_model");
                $wd = $this->employee_model->login($this->input->post('username'),$this->input->post('password'))->result();
                
                if(empty($wd)){
                   // echo $this->input->post('username')." ". $this->input->post('password');
                    $data['error'] = "login fail";
                    $this->load->view('page_admin/login',$data);
                }else{
                    
                    $this->create_session($wd);
                    if($_SESSION['emp_branch_id'] == 1){
                        redirect(base_url().'index.php/page_admin/dashboard');
                    }else{
                        redirect(base_url().'index.php/page_admin/employee_work');
                    }
                    

                }

			}
        }
        
        
    }
    //------------------ employee--------------
    public function emp_wod_complete(){
        //$this->check_all();
        if($this->checklogin() == false){
            redirect(base_url()."index.php/page_admin/");
        }
        $this->load->model('workorder_model');

        $this->workorder_model->update_status($this->input->post('wodid'),1,$_SESSION['employee_id']);
        redirect(base_url()."index.php/page_admin/employee_work");
    }
    public function employee_work($page=1){
        if($this->checklogin() == false){
            redirect(base_url()."index.php/page_admin/");
        }
        
        $data['numpage'] = ceil( ($this->getPage_number(1)/10) );
        $data['page']= $page;
        if($data['numpage'] !=0){
            if($page <=0 || $page > $data['numpage']){
                die();
            }    
        }

        $page_a = $page -1;
        $this->load->model('quote_model');
        //$data['quotes'] = $this->quote_model->getQuoteLimitPage($page_a*10,10,1)->result();
        $data['quotes'] = $this->quote_model->getQuotes_by_status2_emp($page_a*10,10,1,$_SESSION['employee_id'])->result();
        foreach ($data['quotes'] as $key => $value) {
            $data['quotes'][$key]->total = $this->quote_model->getTotal($value->quote_id)->result()[0]->total;
        }
        $this->load->view('page_admin/employee_work',$data);
    }
    //--------------------------------------
    private function check_all(){
        
        if($this->checklogin() == false){
            redirect(base_url()."index.php/page_admin/");
        }
        if($_SESSION['emp_branch_id'] == 2 ){
            die();
        }
       
    }
    private function checklogin(){
        if(empty($_SESSION['logged_in_admin'])){
            return false;
        }else{ //login
            return true;
        }
    }
    private function checkheadoffice(){
        if(empty($_SESSION['emp_branch_id'])){
            return false;
        }else{ 
            if($_SESSION['emp_branch_id'] ==0||$_SESSION['emp_branch_id'] ==1){
                return true;
            }
            else{
                return false;
            }
        }
    }
    private function create_session($emp_data)
    {  

		foreach ($emp_data as $key => $value) {
			$newdata = array(
				'employee_id'			=> $value->employee_id,
				'employee_no'			=> $value->employee_no,
				'employee_name'     		=> $value->employee_name,
				'emp_branch_id'     		=> $value->emp_branch_id,
				'employee_username'     		=> $value->employee_username,
				'emp_branch_id'     		=> $value->emp_branch_id,
				'emp_branch_name'     		=> $value->emp_branch_name,
				'logged_in_admin' 				=> TRUE
			);
		}
		$array_items = array(
			'employee_id'				,
			'employee_no'			    ,
			'employee_name'     		,
			'emp_branch_id'     		,
			'employee_username'     	,
			'emp_branch_id'     		,
			'emp_branch_name'     		,
			'logged_in_admin'							

			);
		
		$this->session->set_userdata($newdata);
		$this->session->mark_as_temp($array_items, 3600);
    }
    
    public function delete_quote_quote()
    {
        $this->check_all();
        $this->deleteQuote($this->input->post('qid'));
        redirect(base_url()."index.php/page_admin/quote");
    }
    public function delete_quote_dashboard()
    {
        $this->check_all();
        $this->deleteQuote($this->input->post('qid'));
        redirect(base_url()."index.php/page_admin/dashboard");
    }
    public function delete_quote_workorder()
    {
        $this->check_all();
        $this->deleteQuote($this->input->post('qid'));
        redirect(base_url()."index.php/page_admin/workorder");
    }
    public function delete_quote_recive()
    {
        $this->check_all();
        $this->deleteQuote($this->input->post('qid'));
        redirect(base_url()."index.php/page_admin/recive");
    }
    private function deleteQuote($qid)
    {
        $this->check_all();
        $this->load->model('quote_model');
        $this->quote_model->deleteQuote($this->input->post('qid'));
    }

    public function working($qid=null)
    {
        $this->check_all();
        $this->load->model('workorder_model');
        $data['qid'] = $qid;
        $data['workorder'] = $this->workorder_model->getWorkorder_by_quoteNo($qid)->result();

        $this->load->model('employee_model');
        $data['employee'] = $this->employee_model->getEmployeeByBranch(2)->result();
        $this->load->view('page_admin/working',$data);
    }
    public function addEmptoWorking(){
        $this->check_all();
        
        
        $this->load->model('workorder_model');
        $this->workorder_model->update_emp($this->input->post('woid'),$this->input->post('empid'));

        redirect(base_url()."index.php/page_admin/working/".$this->input->post('qid'));
    }
    //------ change Status ---------
    public function changeStatusQuote_quote_to_recive()
    {
        $this->check_all();
        $this->changeStatus(2,$this->input->post('qid'));
        redirect(base_url()."index.php/page_admin/workorder");
    }
    public function changeStatusQuote_quote_to_working()
    {
        $this->check_all();
        $this->changeStatus(1,$this->input->post('qid'));
        redirect(base_url()."index.php/page_admin/quote");
    }
    public function changeStatusQuote_dashboard_to_working()
    {
        $this->check_all();
        $this->changeStatus(1,$this->input->post('qid'));
        redirect(base_url()."index.php/page_admin/dashboard");
    }
    private function changeStatus($status,$qid)
    {
        $this->check_all();
        $this->load->model('quote_model');
        $this->quote_model->updateStatusQuote($status,$this->input->post('qid'));
        $this->load->model('workorder_detail_model');
        $wd = $this->workorder_detail_model->getIdWorkorderDetails()->result();

        $this->load->model('employee_model');        
        $this->load->model('workorder_model');        
        
        foreach($wd as $value){
            $arr = array(
                'workorder_status' => 0,
                'quote_id' => $qid,
                'workorder_detail_id' => $value->workorder_detail_id,
            );  
            $this->workorder_model->insert_workorder($arr);
        }
        
        
    }
    //------ ----------- ---------
    public function search()
    {
        $this->check_all();
        if($this->input->post('submit')== null){
            $this->load->view('page_admin/search');    
        }else{
            $this->load->model('quote_model');
            $data['quotes'] = $this->quote_model->search($this->input->post('search'))->result();
            foreach ($data['quotes'] as $key => $value) {
                $data['quotes'][$key]->total = $this->quote_model->getTotal($value->quote_id)->result()[0]->total;
            }
            $this->load->view('page_admin/search',$data);
        }
        
        
    }
    public function profile()
    {
        $this->check_all();
        $this->load->view('page_admin/profile');
    }
    public function quote()
    {
        $this->check_all();
        $this->load->model('quote_model');
        $data['quotes'] = $this->quote_model->getQuotes_by_status(0)->result();
        
        foreach ($data['quotes'] as $key => $value) {
            $data['quotes'][$key]->total = $this->quote_model->getTotal($value->quote_id)->result()[0]->total;
        }
        
        
        $this->load->view('page_admin/quote',$data);
    }
    public function workorder($page=1)
    {

        $this->check_all();
        $data['numpage'] = ceil( ($this->getPage_number(1)/10) );
        $data['page']= $page;
        if($data['numpage'] !=0){
            if($page <=0 || $page > $data['numpage']){
                die();
            }    
        }

        $page_a = $page -1;
        $this->load->model('quote_model');
        //$data['quotes'] = $this->quote_model->getQuoteLimitPage($page_a*10,10,1)->result();
        $data['quotes'] = $this->quote_model->getQuotes_by_status2($page_a*10,10,1)->result();
        foreach ($data['quotes'] as $key => $value) {
            $data['quotes'][$key]->total = $this->quote_model->getTotal($value->quote_id)->result()[0]->total;
        }
        //echo json_encode($data[]);
        $this->load->view('page_admin/workorder',$data);
    }
   
    public function create_recive(){
        $this->check_all();
        if($this->input->post('submit') == null)
        {
            $data['qid'] = $this->input->post('qid');
            $data['qno'] = $this->input->post('qno');
            $this->load->view('page_admin/create_recive',$data);
        }else{
            $config['upload_path']          = 'upload';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 0;
            $config['file_name']    = $this->input->post('qno');
            $config['overwrite']        = true;    

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    $data['error']= 'file type not pdf';
                    $data['qid'] = $this->input->post('qid');
                    $data['qno'] = $this->input->post('qno');
                    $this->load->view('page_admin/create_recive',$data);
            }
            else
            {
                $data = array('file' => $this->upload->data());
                $this->load->model('recive_model');
                $date=date("Y-m-d");
                $date_y = date('Y-m-d',strtotime('+1 year'));
                $date = DateTime::createFromFormat("Y-m-d",$date);
                $date_y = DateTime::createFromFormat("Y-m-d",$date_y);

                $arr = array(
                    'recive_no' =>$this->input->post('qno'),
                    'quote_id' => $this->input->post('qid'),
                    'recive_certificate_url' => base_url()."upload/".$this->input->post('qno').".pdf",
                    'recive_certificate_issue' => $date->format("Y-m-d"),
                    'recive_certificate_expiry' => $date_y->format('Y-m-d')

                );
                $this->recive_model->insert($arr);
                $this->load->model('quote_model');
                $this->quote_model->updateStatusQuote(2,$this->input->post('qid'));
                redirect(base_url().'index.php/page_admin/recive');
            }
        }
    }
    public function recive($page=1)
    {        
        $this->check_all();

        $data['numpage'] = ceil( ($this->getPage_number(2)/10) );
        $data['page']= $page;
        if($data['numpage'] !=0){
            if($page <=0 || $page > $data['numpage']){
                die();
            }    
        }
        

        $this->load->model("quote_model");
        $page_a = $page -1;
        $data['quotes'] = $this->quote_model->getQuoteLimitPage($page_a*10,10,2)->result();
        //echo json_encode($result);
        //$data['quotes'] = $this->quote_model->getQuotes_by_status(2)->result();
        foreach ($data['quotes'] as $key => $value) {
            $data['quotes'][$key]->total = $this->quote_model->getTotal($value->quote_id)->result()[0]->total;
        }
        $this->load->view('page_admin/recive',$data);
    }
    private function getPage_number($status)
    {
        $this->load->model('quote_model');
        $num = $this->quote_model->getNumQuote($status)->result();
        return $num[0]->numquote;
    }
    public function product()
    {
        $this->check_all();
        $this->load->model('product_category_model');
        $this->load->model('product_model');

        $data['category'] = $this->product_category_model->getProductCategories()->result();
        foreach ($data['category'] as $key => $value) {
            $data['category'][$key]->products = $this->product_model->getProducts_by_category($value->product_category_id)->result();
        }
        
        //echo json_encode($data['category']);
        $this->load->view('page_admin/product',$data);
    }
    public function employee()
    {
        $this->check_all();
        $this->load->model("employee_model");
        $data['emps'] = $this->employee_model->getEmps()->result();
        $this->load->view('page_admin/employee',$data);
        
    }
    
    public function dashboard()
    {
        $this->check_all();
        $this->load->model('quote_model');
        $date = DateTime::createFromFormat("Y-m-d",date("Y-m-d"));
        
        $data['quotes'] = $this->quote_model->getQuote_by_date($date->format('Y-m-d'))->result();
        //echo json_encode($data['quotes']);
        $data['date'] = $date->format('d-m-Y');
        foreach ($data['quotes'] as $key => $value) {
            $data['quotes'][$key]->total = $this->quote_model->getTotal($value->quote_id)->result()[0]->total;
        }
        $this->load->view('page_admin/dashboard',$data);
    }
    
    public function edit_employee($eid = null)
    {
        $this->check_all();
        $data['eid'] = $eid;
        if($this->input->post('submit') == null)
        {
            $this->load->model('employee_model');
            $data['employee'] = $this->employee_model->getOneEmployee($eid)->result(); 
            
            $this->load->model('emp_branch_model');
            $data['branchs'] = $this->emp_branch_model->getBranchs()->result();

            $this->load->view('page_admin/edit_employee',$data);
        }else{
            $this->load->library('form_validation');

            $this->form_validation->set_rules('employee_name', 'employee_name', 'required|max_length[70]');
            //$this->form_validation->set_rules('employee_username', 'employee_username', 'required|max_length[20]');
            //$this->form_validation->set_rules('employee_password', 'employee_password', 'required|max_length[20]');
            
            //-- error not varidation branch id --
            //$this->form_validation->set_rules('branch_id', 'branch_id', 'required|greater_than_or_equal_to[0]|less_than['.$last_id.']');
            //'required|integer|greater_than_or_equal_to[0]|less_than[101]|decimal');
			
			if ($this->form_validation->run() == FALSE)
			{
                //-- error form
                echo "<script>alert('fail')</script>";
                $this->load->model('employee_model');
                $data['employee'] = $this->employee_model->getOneEmployee($eid)->result(); 
    
                $this->load->model('emp_branch_model');
                $data['branchs'] = $this->emp_branch_model->getBranchs()->result();
    
                $this->load->view('page_admin/edit_employee',$data);
			}
            else
            {
                //update emp
                //
                $ar = array(
                    'employee_id' => $this->input->post('employee_id'),
                    'employee_name' => $this->input->post('employee_name'),
                    'employee_username' => $this->input->post('employee_username'),
                    'emp_branch_id' => $this->input->post('branch_id'),
                    'employee_status' => $this->input->post('employee_status')
                );
                $this->load->model('employee_model');
                $this->employee_model->updateOneEmployee();
                redirect(base_url().'index.php/page_admin/employee');
            }
        }
        
    }
    public function add_employee()
    {
        $this->check_all();
        if($this->input->post('submit') == null){
            $this->load->model('emp_branch_model');
            $data['branchs'] = $this->emp_branch_model->getBranchs()->result();
            $this->load->view('page_admin/add_employee',$data);   
        }else{
            $this->load->model('emp_branch_model');
            $this->load->library('form_validation');

            $last_id = $this->emp_branch_model->getLastId()->result();
            $last_id = $last_id[0]->emp_branch_id+1;
            $this->form_validation->set_rules('employee_name', 'employee_name', 'required|max_length[70]');
            $this->form_validation->set_rules('employee_username', 'employee_username', 'required|max_length[20]');
            $this->form_validation->set_rules('employee_password', 'employee_password', 'required|max_length[20]');
            
            //-- error not varidation branch id --
            //$this->form_validation->set_rules('branch_id', 'branch_id', 'required|greater_than_or_equal_to[0]|less_than['.$last_id.']');
            //'required|integer|greater_than_or_equal_to[0]|less_than[101]|decimal');
			
			if ($this->form_validation->run() == FALSE)
			{
                //-- error form
                echo "<script>alert('fail')</script>";
				$this->load->model('emp_branch_model');
                $data['branchs'] = $this->emp_branch_model->getBranchs()->result();
                $this->load->view('page_admin/add_employee',$data);
			}
            else
            {
                //insert emp
                $arr = array(
                    'employee_name' => $this->input->post('employee_name'),
                    'employee_username' => $this->input->post('employee_username'),
                    'employee_password' => md5(sha1($this->input->post('employee_password'))),
                    'emp_branch_id' => $this->input->post('branch_id'),
                    'employee_status' => 1
                );
                $this->load->model('employee_model');
                $this->employee_model->insertEmp($arr);
                redirect(base_url().'index.php/page_admin/employee');
            }
        }
        
    }
    
   
    public function admin_wod_complete()
    {
        $this->check_all();
        $this->load->model('workorder_model');

        $this->workorder_model->update_status($this->input->post('wodid'),1);
        redirect(base_url()."index.php/page_admin/working/".$this->input->post('qid'));
    }
    public function admin_wod_not_complete()
    {
        $this->check_all();
        $this->load->model('workorder_model');

        $this->workorder_model->update_status($this->input->post('wodid'),0);
        redirect(base_url()."index.php/page_admin/working/".$this->input->post('qid'));
    }
    public function recieve_detail($qid=null)
    {
        $this->check_all();
        $this->load->model('recive_model');
        $data['recieve'] = $this->recive_model->getRecieve($qid)->result();
        $data['qid'] = $qid;
        $this->load->view('page_admin/recieve_detail',$data);
    }
    public function test_cron()
    {
        $this->check_all();
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
		$htmlContent = '<h1>cron</h1>';
		$htmlContent .= "<p>cron</p>";

		$this->email->to('58160698@go.buu.ac.th');
		$this->email->from('qmcal.th@gmail.com','QMC');
		$this->email->subject('QMC Vertify ');
		$this->email->message($htmlContent);
		
		//Send email
		$this->email->send();
    }
    public function change_product_status_remove(){
        $this->check_all();
        $this->load->model('product_model');
        $this->product_model->change_status($this->input->post('pid'),1);
        redirect(base_url().'index.php/page_admin/product');
    }
    public function edit_product($pid=null)
    {
        $this->check_all();
        if($this->input->post('submit') ==null)
        {  
            $data['pid'] = $pid;
            $this->load->model('product_model');
            $data['product'] = $this->product_model->getProduct($pid)->result();
            $this->load->view('page_admin/edit_product',$data);

        }else{
            $this->load->model('product_model');
            $this->product_model->update($pid,$this->input->post('product_name'),$this->input->post('product_price'));
            redirect(base_url().'index.php/page_admin/product');
        }
    }
    public function addproduct($cid = null)
    {
        $this->check_all();
        if($this->input->post('submit') == null)
        {
            $this->load->model('product_category_model');
            $data['cid'] = $cid;
            $data['category']=$this->product_category_model->getProductCategorie($cid)->result();
            $this->load->view('page_admin/add_product',$data);
        }else{
            $this->load->library('form_validation');
			$this->form_validation->set_rules('product_name', 'product_name', 'required|max_length[60]');
			$this->form_validation->set_rules('product_price', 'product_price', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
                $data['cid'] = $cid;
				$this->load->model('product_category_model');
                $data['category']=$this->product_category_model->getProductCategorie($cid)->result();
                $this->load->view('page_admin/add_product',$data);
				
			}
			else
			{
                $this->load->model('product_model');
                $c_id = $this->product_model->getLastId_cate($cid)->result()[0]->product_no;
                $c_id = intval($c_no)+1;

                for($i=0;$i<=(5-strlen($c_no.""));$i++){
                    $c_no = "0".$c_no;
                }
                echo $c_no;
                $arr = array(
                    'product_no' => $c_no,
                    'product_category_id' => $cid,
                    'product_name' => $this->input->post('product_name'),
                    'product_price' => $this->input->post('product_price')
                );
                $this->product_model->insert($arr);
                redirect(base_url().'index.php/page_admin/product');
                
            }
        }
    }
}