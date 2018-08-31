<?php
class Customer_model extends CI_Model
{
    public function create_new_customer($email)
    {
        $data = array(
            'email' => $email
        );
        $this->db->insert('customer', $data);
    }
    public function getCustomer($email)
    {
        $this->db->select('*');
        $this->db->where('customer_email',$email);
        $this->db->limit(1);
        return $this->db->get('customer');
    }
    public function register()
    {
        $data = array(
            'customer_company' => $this->input->post("company_name"),
            'customer_code' => $this->input->post("company_code"),
            'customer_contact' => $this->input->post("contact"),
            'customer_branch' => $this->input->post("branch"),
            'customer_address' => $this->input->post("address"),
            'customer_postcode' => $this->input->post("postcode"),
            'customer_texid' => $this->input->post("tex_id"),
            'customer_tel' => $this->input->post("tel"),
            'customer_mobile' => $this->input->post("mobile"),
            'customer_fax' => $this->input->post("fax"),
            'customer_email' => $_SESSION['customer_email'],
            
            'customer_discount_percent' => 0
        );
        
        $this->db->insert('customer', $data);
    
    }
}