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
                $result = $this->employee_model->login($this->input->post('username'),$this->input->post('password'))->result();
                
                if(empty($result)){
                    echo $this->input->post('username')." ". $this->input->post('password');
                    $data['error'] = "login fail";
                    $this->load->view('page_admin/login',$data);
                }else{
                    
                    $this->create_session($result);
                    redirect(base_url().'index.php/page_admin/dashboard');

                }

			}
        }
        
        
    }
    public function delete_dashboard()
    {
        $this->deleteQuote($this->input->post('qid'));
        redirect(base_url()."index.php/page_admin/dashboard");
    }
    private function deleteQuote($qid)
    {
        $this->load->model('quote_model');
        $this->quote_model->deleteQuote($this->input->post('qid'));
    }

    public function working($qid=null)
    {
        $this->load->model('workorder_model');
        $data['workorder'] = $this->workorder_model->getWorkorder_by_quoteNo($qid)->result();
        $this->load->view('page_admin/working',$data);
    }
    //------ change Status ---------
    public function changeStatus_dashboard()
    {
        $this->changeStatus($this->input->post('status'),$this->input->post('qid'));
        redirect(base_url()."index.php/page_admin/dashboard");
    }
    private function changeStatus($status,$qid)
    {
        $this->load->model('quote_model');
        $this->quote_model->updateStatusQuote($this->input->post('status'),$this->input->post('qid'));
    }
    //------ ----------- ---------
    public function profile()
    {
        $this->load->view('page_admin/profile');
    }
    public function quote()
    {
        $this->load->model('quote_model');
        $data['quotes'] = $this->quote_model->getQuotes()->result();
        foreach ($data['quotes'] as $key => $value) {
            
            $data['quotes'][$key]->total = $this->quote_model->getTotal($value->quote_id)->result()[0]->total;
        }
        
        $this->load->view('page_admin/quote',$data);
    }
    public function workorder()
    {
        $this->load->view('page_admin/workorder');
    }
    public function recive()
    {
        $this->load->view('page_admin/recive');
    }
    public function product()
    {
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
        $this->load->model("employee_model");
        $data['emps'] = $this->employee_model->getEmps()->result();
        $this->load->view('page_admin/employee',$data);
        
    }
    
    public function dashboard()
    {
        $this->load->model('quote_model');
        $date = DateTime::createFromFormat("Y-m-d",date("Y-m-d"));
        
        $data['quotes'] = $this->quote_model->getQuote_by_date($date->format('Y-m-d'))->result();
        
        $data['date'] = $date->format('d-m-Y');
        foreach ($data['quotes'] as $key => $value) {
            
            $data['quotes'][$key]->total = $this->quote_model->getTotal($value->quote_id)->result()[0]->total;
        }
        $this->load->view('page_admin/dashboard',$data);
    }
    public function gen_pw()
    {
        echo md5(sha1('p@ssw0rd'));
    }
    public function edit_employee($eid = null)
    {
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
                    'employee_status' => 0
                );
                $this->load->model('employee_model');
                $this->employee_model->insertEmp($arr);
                redirect(base_url().'index.php/page_admin/employee');
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
}