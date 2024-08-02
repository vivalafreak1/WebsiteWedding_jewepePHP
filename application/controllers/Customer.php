<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
    }

    public function index()
    {
        $data = array(
            'title' => 'Customer Order Search',
            'page' => 'customer/search',
        );

        $this->load->view('customer/template/main', $data);
    }

    public function search()
    {
        $email = $this->input->post('email');
        if ($email) {
            $data = array(
                'title' => 'Customer Order Search',
                'page' => 'customer/search',
                'orders' => $this->order_model->get_orders_by_email($email)
            );
            $this->load->view('customer/template/main', $data);
        } else {
            redirect('customer');
        }
    }
}
