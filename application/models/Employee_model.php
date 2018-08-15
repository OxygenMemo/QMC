<?php 
class Employee_model extends CI_Model 
{
    public function login($u,$p){
        $data = array($u,md5(sha1($p)));
        $this->db->where('employee_username',$u);
        $this->db->where('employee_password',md5(sha1($p)));
        $this->db->limit(1);
        $this->db->join('emp_branch','employee.emp_branch_id = emp_branch.emp_branch_id',"left");
        return $this->db->get('employee');
    }
    public function getEmps(){
        $this->db->join('emp_branch','emp_branch.emp_branch_id = employee.emp_branch_id','left');
        return $this->db->get('employee');
    }
    public function insertEmp($arr){
        $this->db->insert('employee',$arr);
    }
    public function changeStatus($status)
    {
        
    }
    public function getOneEmployee($eid)
    {
        $this->db->limit(1);
        $this->db->where('employee_id',$eid);
        return $this->db->get('employee');
    }
    public function updateOneEmployee()
    {
        $this->db->set('employee_name', $this->input->post('employee_name'));

        $this->db->set('emp_branch_id', $this->input->post('branch_id'));
        $this->db->set('employee_status', $this->input->post('employee_status'));
        $this->db->where('employee_id', $this->input->post('employee_id'));
        $this->db->update('employee');

    }
}