<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_menu.id_kategori', 'left');
        $this->db->order_by('tbl_menu.id_menu', 'desc');

        return $this->db->get()->result();
    }
    public function get_all_data_kategori()
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }
    public function detail_menu($id_menu)
    {
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_menu.id_kategori', 'left');

        $this->db->where('id_menu', $id_menu);

        return $this->db->get()->row();
    }
    public function kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }
    public function get_all_data_menu($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_menu.id_kategori', 'left');
        $this->db->where('tbl_menu.id_kategori', $id_kategori);

        return $this->db->get()->result();
    }
}
