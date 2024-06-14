<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_pesanan()
    {
        $this->db->select('*');
        $this->db->from('tb_order tbo');
        $this->db->join('tb_catalogues tbc', 'tbc.catalogue_id = tbo.catalogue_id');
        $this->db->order_by('tbo.updated_at', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_all_laporan()
    {
        $this->db->select('order_id, tbo.catalogue_id, image, package_name, price, status, status_publish, Count(*) As jumlah_pesanan');
        $this->db->from('tb_order tbo');
        $this->db->join('tb_catalogues tbc', 'tbc.catalogue_id = tbo.catalogue_id');
        $this->db->group_by('tbo.catalogue_id');
        $this->db->order_by('tbo.updated_at', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_count_pesanan($status)
    {
        $this->db->select('*');
        $this->db->from('tb_order tbo');
        $this->db->join('tb_catalogues tbc', 'tbc.catalogue_id = tbo.catalogue_id');
        if($status != 'all') {
            $this->db->where('tbo.status', $status);
        }
        $query = $this->db->get();
        return $query;
    }

    public function cek_data_pesanan($id, $email, $wedding_date)
    {
        $this->db->select('*');
        $this->db->from('tb_order tbo');
        $this->db->join('tb_catalogues tbc', 'tbc.catalogue_id = tbo.catalogue_id');
        $this->db->where('tbo.catalogue_id', $id);
        $this->db->where('tbo.email', $email);
        $this->db->where('tbo.wedding_date', $wedding_date);
        $this->db->order_by('tbo.updated_at', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_pesanan_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tb_order tbo');
        $this->db->join('tb_catalogues tbc', 'tbc.catalogue_id = tbo.catalogue_id');
        $this->db->where('tbo.order_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function insert($data)
    {
        return $this->db->insert('tb_order', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('order_id', $id);
        $query = $this->db->update('tb_order', $data);
        return $query;
    }

    public function delete_by_id($id)
    {
        $this->db->where('order_id', $id);
        return $this->db->delete('tb_order');
    }
}