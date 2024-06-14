<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('katalog_model');
        $this->load->helper('text'); //helper untuk word_limiter()
    }
	public function index()
	{
        $data = array(
            'title' => 'JeWePe Wedding Organizer',
            'page' => 'landing/beranda',
            'getAllKatalog' => $this->katalog_model->get_all_katalog_landing()->result()
        );

		$this->load->view('landing/template/sites', $data);
	}

    public function detail()
    {
        if ($this->input->get('id'))
        {
            $cek_data = $this->katalog_model->get_katalog_by_id($this->input->get('id'))->num_rows(); 

            if($cek_data > 0)
            {
                $data = array(
                    'title' => 'JeWePe wedding Organizer',
                    'page' => 'landing/detail',
                    'katalog' => $this->katalog_model->get_katalog_by_id($this->input->get('id'))->row()
                );

                $this->load->view('landing/template/sites', $data);
            } else {
                redirect('/');
            }
        } else {
            redirect('/');
        }
    }
}
