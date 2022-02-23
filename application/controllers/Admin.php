
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_admin');
    }


    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'total_menu' => $this->m_admin->total_menu(),
            'total_booking' => $this->m_admin->total_booking(),
            'total_pelanggan' => $this->m_admin->total_pelanggan(),
            'total_pesanan' => $this->m_admin->total_pesanan_masuk(),
            'isi' => 'v_admin',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    public function pesanan_masuk()
    {
        $data = array(
            'title' => 'Pesanan Masuk',
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'isi' => 'v_pesanan_masuk',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    public function proses($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '1',
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses!!!');

        redirect('admin/pesanan_masuk');
    }
    public function selesai($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '2',
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil telah selesai!!!');

        redirect('admin/pesanan_masuk');
    }
}

/* End of file Controllername.php */
