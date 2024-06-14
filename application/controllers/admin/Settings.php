<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata('username'))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan login dahulu!</div>');
            redirect('login');
        }
        $this->load->model('settings_model');
    }
	public function index()
	{
        $data = array(
            'title' => 'JeWePe Wedding Organizer',
            'page' => 'admin/settings',
            'settings' => $this->settings_model->getSettings('1')->row()
        );

		$this->load->view('admin/template/main', $data);
	}

    public function updateData()
    {
        $post = $this->input->post();

        // var_dump($post);
        // die;

        if($post) {
            $cek_id = $this->settings_model->getSettings($post['id'])->num_rows();

            if ($cek_id > 0) {
                $getSettings = $this->settings_model->getSettings($post['id'])->row();
                $filename = date('Ymd') . '_' . rand();

                $datetime = date("Y-m-d H:i:s");
                $data = array(
                    'website_name' => $post['website_name'],
                    'phone_number1' => $post['phone_number1'],
                    'phone_number2' => $post['phone_number2'],
                    'email1' => $post['email1'],
                    'email2' => $post['email2'],
                    'address' => $post['address'],
                    'maps' => $post['maps'],
                    'Facebook_url' => $post['Facebook_url'],
                    'Instagram_url' => $post['Instagram_url'],
                    'Youtube_url' => $post['Youtube_url'],
                    'Header_bussines_hour' => $post['Header_bussines_hour'],
                    'Time_bussines_hour' => $post['Time_bussines_hour'],
                    'updated_at' => $datetime
                );

                if (!empty($_FILES['Logo']['name'])) {
                    //delete file
                    if (file_exists('./assets/files/' . $getSettings->Logo) && $getSettings->Logo) {
                        unlink('./assets/files/' . $getSettings->Logo);
                    }
                    $upload = $this->_do_upload($filename);
                    $data['Logo'] = $upload;
                }
                
                $update = $this->settings_model->update($post['id'], $data);

                if($update) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
                    redirect('admin/Settings');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal diupdate!</div>');
                    redirect('admin/Settings');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID tidak ditemukan</div>');
                redirect('admin/Settings');
            }
        } else {
            redirect('admin/Settings');
        }
    }

    private function _do_upload($filename)
    {
        $config['file_name'] = $filename;
        $config['upload_path'] = './assets/files';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['create_thumb'] = FALSE;
        $config['quality'] = '90%';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('Logo')) {
            $data['inputError'][] = 'Logo';
            $data['error_string'][] = 'Upload error: '. $this->upload->display_errors('', ''); 
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
}
