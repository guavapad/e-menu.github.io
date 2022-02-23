<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_daftar_booking extends CI_Model
{
    public function daftar_booking()
    {
        $this->db->select('*');
        $this->db->from('tbl_booking');
        // $this->db->where('id_booking', $id_booking);
        $this->db->where('status_booking=0');
        $this->db->order_by('id_booking', 'desc');
        return $this->db->get()->result();
    }
    public function update_booking($data)
    {
        $this->db->where('id_booking', $data['id_booking']);
        $this->db->update('tbl_booking', $data);
    }
    public function booking_diproses()
    {
        $this->db->select('*');
        $this->db->from('tbl_booking');
        $this->db->where('status_booking=1');
        $this->db->where('status_bayar=1');
        $this->db->order_by('id_booking', 'desc');
        return $this->db->get()->result();
    }
    public function booking_selesai()
    {
        $this->db->select('*');
        $this->db->from('tbl_booking');
        $this->db->where('status_booking=2');
        $this->db->where('status_bayar=1');
        $this->db->order_by('id_booking', 'desc');
        return $this->db->get()->result();
    }
    public function delete($data)
    {
        $this->db->where('id_booking', $data['id_booking']);
        $this->db->delete('tbl_booking', $data);
    }
}
