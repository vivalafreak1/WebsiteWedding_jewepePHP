<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index()
	{
        $data = array(
            'title' => 'JeWePe Wedding Organizer',
        );

		$this->load->view('admin/login', $data);
	}
}
