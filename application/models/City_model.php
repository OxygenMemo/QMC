<?php
class City_model extends CI_Model
{
    public function getCities()
    {
        return $this->db->get('city');
    }
}