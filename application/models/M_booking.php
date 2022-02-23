<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_booking extends CI_Model
{
    public function booking_tempat()
    {
        $this->db->select('*');
        $this->db->from('tbl_booking');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_booking=0');
        $this->db->order_by('id_booking', 'desc');
        return $this->db->get()->result();
    }
    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('tbl_booking');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_booking=1');
        $this->db->order_by('id_booking', 'desc');
        return $this->db->get()->result();
    }
    public function booking_selesai()
    {
        $this->db->select('*');
        $this->db->from('tbl_booking');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_booking=2');
        $this->db->where('status_bayar=1');
        $this->db->order_by('id_booking', 'desc');
        return $this->db->get()->result();
    }
    public function simpan_booking($data)
    {
        $this->db->insert('tbl_booking', $data);
    }
    public function detail_booking($id_booking)
    {
        $this->db->select('*');
        $this->db->from('tbl_booking');
        $this->db->where('id_booking', $id_booking);
        return $this->db->get()->row();
    }
    public function upload_buktibayar($data)
    {
        $this->db->where('id_booking', $data['id_booking']);
        $this->db->update('tbl_booking', $data);
    }
}
