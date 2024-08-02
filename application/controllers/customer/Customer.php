<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
        $this->load->library('session');
    }

    public function login()
    {
        $this->load->view('customer/login');
    }

    public function login_process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $customer = $this->customer_model->login($username, $password);

        if ($customer) {
            $this->session->set_userdata('customer_id', $customer->customer_id);
            redirect('customer/dashboard');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Invalid username or password!</div>');
            redirect('customer/login');
        }
    }

    public function dashboard()
    {
        if (!$this->session->userdata('customer_id')) {
            redirect('customer/login');
        }

        $data['orders'] = $this->customer_model->get_orders($this->session->userdata('customer_id'))->result();
        $this->load->view('customer/dashboard', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('customer/login');
    }
}
