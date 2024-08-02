<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function register($data) {
        return $this->db->insert('tb_customers', $data);
    }

    public function login($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('tb_customers');

        if ($query->num_rows() == 1) {
            $customer = $query->row();
            return password_verify($password, $customer->password);
        }
        return false;
    }

    public function get_customer_by_email($email) {
        $this->db->where('email', $email);
        return $this->db->get('tb_customers')->row();
    }
}
