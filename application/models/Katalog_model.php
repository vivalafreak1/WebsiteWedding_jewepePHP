<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Katalog_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_katalog()
    {
        $this->db->select('*');
        $this->db->from('tb_catalogues tbc');
        $this->db->join('tb_users tbu', 'tbu.user_id = tbc.user_id');
        $this->db->order_by('tbc.updated_at', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_all_katalog_landing()
    {
        $this->db->select('*');
        $this->db->from('tb_catalogues tbc');
        $this->db->join('tb_users tbu', 'tbu.user_id = tbc.user_id');
        $this->db->where('tbc.status_publish', 'Y');
        $this->db->order_by('tbc.updated_at', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_katalog_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tb_catalogues tbc');
        $this->db->join('tb_users tbu', 'tbu.user_id = tbc.user_id');
        $this->db->where('tbc.catalogue_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function insert($data)
    {
        return $this->db->insert('tb_catalogues', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('catalogue_id', $id);
        $query = $this->db->update('tb_catalogues', $data);
        return $query;
    }

    public function delete_by_id($id)
    {
        $this->db->where('catalogue_id', $id);
        return $this->db->delete('tb_catalogues');
    }
}