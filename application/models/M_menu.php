<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_menu.id_kategori', 'left');
        $this->db->order_by('tbl_menu.id_menu', 'desc');

        return $this->db->get()->result();
    }
    public function get_data($id_menu)
    {
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_menu.id_kategori', 'left');
        $this->db->where('id_menu', $id_menu);
        return $this->db->get()->row();
    }
    public function add($data)
    {
        $this->db->insert('tbl_menu', $data);
    }
    public function edit($data)
    {
        $this->db->where('id_menu', $data['id_menu']);
        $this->db->update('tbl_menu', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_menu', $data['id_menu']);
        $this->db->delete('tbl_menu', $data);
    }
}
