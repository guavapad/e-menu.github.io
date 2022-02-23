<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function simpan_transaksi($data)
    {
        $this->db->insert('tbl_transaksi', $data);
    }
    public function simpan_status($status)
    {
        $this->db->where('id_meja', $status['id_meja']);
        $this->db->update('tbl_meja', $status);
    }
    public function update_status($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('tbl_transaksi', $data);
    }
    public function simpan_rinci_transaksi($data_rinci)
    {
        $this->db->insert('tbl_rinci_transaksi', $data_rinci);
    }
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->join('tbl_daftar_meja', 'tbl_daftar_meja.id_meja = tbl_transaksi.id_meja', 'left');
        $this->db->order_by('tbl_transaksi.id_transaksi', 'desc');

        return $this->db->get()->result();
    }
    // public function get_data($id_menu)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_menu');
    //     $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_menu.id_kategori', 'left');
    //     $this->db->where('id_menu', $id_menu);
    //     return $this->db->get()->row();
    // }
    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function detail_pesanan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->row();
    }
    public function rekening()
    {
        $this->db->select('*');
        $this->db->from('tbl_rekening');
        return $this->db->get()->result();
    }
    public function upload_buktibayar($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('tbl_transaksi', $data);
    }
}
