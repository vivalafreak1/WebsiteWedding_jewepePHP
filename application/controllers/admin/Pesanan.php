<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
	
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
            'page' => 'admin/pesanan',
            'getAllPesanan' => $this->pesanan_model->get_all_pesanan()->result(),
        );

		$this->load->view('admin/template/main', $data);
	}

    public function updateStatus()
    {
        if($this->input->get()) {
            $get = $this->input->get();
            $cek_data = $this->pesanan_model->get_pesanan_by_id($get['id'])->num_rows();

            if($cek_data > 0)
            {
                // var_dump($get);
                // die;
                $datetime = date("Y-m-d H:i:s");
                $data = array(
                    'status' => $get['status'],
                    'user_id' => $this->session->userdata('user_id'),
                    'updated_at' => $datetime,
                );

                $update = $this->pesanan_model->update($get['id'], $data);

                if($update)
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status pesanan berhasil diperbarui!</div>');
                    redirect('admin/Pesanan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Status pesanan gagal diperbarui!</div>');
                    redirect('admin/Pesanan');
                }
            }
        } else {
            redirect('admin/Pesanan');
        }
    }
    public function delete()
    {
        if(!empty($this->input->get('id', true))) {
            $delete = $this->pesanan_model->delete_by_id($this->input->get('id', true));

            if($delete) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pesanan berhasil dihapus!</div>');
                redirect('admin/Pesanan');
            } else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data pesanan gagal dihapus!</div>');
                redirect('admin/Pesanan');
            }
        } else {
            redirect('admin/Pesanan');
        }
    }
}
