<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends CI_Controller {
	
	public function index()
	{
        $data = array(
            'title' => 'JeWePe Wedding Organizer',
            'page' => 'admin/katalog'
        );

		$this->load->view('admin/template/main', $data);
	}
}
