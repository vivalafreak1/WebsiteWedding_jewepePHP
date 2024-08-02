<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model'); // Load your customer model
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $data = array(
            'title' => 'Customer Login',
        );

        $this->load->view('customer/login', $data);
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Check login credentials
        $customer = $this->Customer_model->login($email, $password);

        if ($customer) {
            // Set session data
            $this->session->set_userdata('customer_id', $customer->id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Login successful!</div>');
            redirect('customer/dashboard');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Invalid email or password!</div>');
            redirect('customer');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('customer_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logged out successfully!</div>');
        redirect('customer');
    }

    public function dashboard()
    {
        $customer_id = $this->session->userdata('customer_id');

        if (!$customer_id) {
            redirect('customer');
        }

        $data = array(
            'title' => 'Customer Dashboard',
            'orders' => $this->Customer_model->get_orders_by_customer($customer_id),
        );

        $this->load->view('customer/template/main', $data);
    }
}
