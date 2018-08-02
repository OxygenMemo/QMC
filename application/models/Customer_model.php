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
    public function check_email($email)
    {
        $this->db->select('customer_email');
        $this->db->where('customer_email',$email);
        $this->db->limit(1);
        return $this->db->get('customer');
    }
}