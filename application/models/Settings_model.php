<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getSettings($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('tb_settings');
        return $query;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('tb_settings', $data);
        return $query;
    }
}