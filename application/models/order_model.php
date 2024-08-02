<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_orders_by_email($email)
    {
        $this->db->select('tbo.*, tbc.image, tbc.package_name');
        $this->db->from('tb_order tbo');
        $this->db->join('tb_catalogues tbc', 'tbc.catalogue_id = tbo.catalogue_id');
        $this->db->where('tbo.email', $email);
        $query = $this->db->get();
        return $query->result();
    }
}
