<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata('username'))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan login dahulu!</div>');
            redirect('login');
        }
        $this->load->model('pesanan_model');
    }
	public function index()
	{
        $data = array(
            'title' => 'JeWePe Wedding Organizer',
            'page' => 'admin/laporan',
            'getAllLaporan' => $this->pesanan_model->get_all_laporan()->result(),
        );

		$this->load->view('admin/template/main', $data);
	}
}
