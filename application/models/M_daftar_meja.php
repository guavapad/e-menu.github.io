<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_daftar_meja extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_meja');
        $this->db->order_by('id_meja', 'desc');
        return $this->db->get()->result();
    }
    public function add($data)
    {
        $this->db->insert('tbl_meja', $data);
    }
    public function edit($data)
    {

        $this->db->where('id_meja', $data['id_meja']);
        $this->db->update('tbl_meja', $data);
    }
    public function update_all($data)
    {

        // $this->db->where('id_meja', $data['id_meja']);
        $this->db->update('tbl_meja', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_meja', $data['id_meja']);
        $this->db->delete('tbl_meja', $data);
    }
}
