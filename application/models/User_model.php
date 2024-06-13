<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class User_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getUserByUsername1($username)
    {
        $sql = 'SELECT * FROM tb_users WHERE username = ' . $this->db->escape($username);
        $query = $this->db->query($sql);
        return $query;
    }

    public function getUserByUsername2($where)
    {
        return $this->db->select('user_id, name, username, password, created_at, updated_at')
            ->from('tb_users')
            ->where($where)
            ->get();
    }

    public function getUserByUsername3($username)
    {
        $this->db->select('user_id,username,password');
        $this->db->where('username', $username);
        $query = $this->db->get('tb_users');
        return $query;
    }

    public function getAllUser()
    {
        $this->db->order_by("user_id", "desc");
        $query = $this->db->get('tb_users');
        return $query;
    }
}