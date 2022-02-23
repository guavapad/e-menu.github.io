<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function total_menu()
    {
        return $this->db->get('tbl_menu')->num_rows();
    }
    public function total_booking()
    {
        return $this->db->get('tbl_booking')->num_rows();
    }
    public function total_pelanggan()
    {
        return $this->db->get('tbl_pelanggan')->num_rows();
    }
    public function total_pesanan_masuk()
    {
        return $this->db->get('tbl_transaksi')->num_rows();
    }
}
