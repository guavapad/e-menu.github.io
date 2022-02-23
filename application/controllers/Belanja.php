
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_transaksi');
        $this->load->model('m_auth');
        $this->load->model('m_daftar_meja');
    }
    public function index()
    {
        if (empty($this->cart->contents())) {
            redirect('home');
        }
        $data = array(
            'title' => 'Keranjang Belanja',
            'isi' => 'v_belanja',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id'    => $this->input->post('id'),
            'qty'    => $this->input->post('qty'),
            'price'    => $this->input->post('price'),
            'name'    => $this->input->post('name'),
        );
        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }
    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
    }
    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty' => $this->input->post($i . '[qty]'),
            );
            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('pesan', 'Keranjang Berhasil di Update');
        redirect('belanja');
    }
    public function clear()
    {
        $this->cart->destroy();
        redirect('belanja');
    }
    public function cekout()

    {
        $this->pelanggan_login->proteksi_halaman();
        $this->form_validation->set_rules('id_meja', 'Nomor Meja', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('metode_bayar', 'Metode Pembayaran', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'checkout pesanan',
                'daftar_meja' => $this->m_daftar_meja->get_all_data(),
                'isi' => 'v_cekout',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            //simpan ke table transaksi
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'no_order' => $this->input->post('no_order'),
                'tgl_order' => date('Y-m-d'),
                'nama_pelanggan' => $this->session->userdata('nama_pelanggan'),
                'id_meja' => $this->input->post('id_meja'),
                'metode_bayar' => $this->input->post('metode_bayar'),
                'catatan_pesanan' => $this->input->post('catatan_pesanan'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status_bayar' => '0',
                'status_order' => '0',

            );
            $status = array(
                'id_meja' => $this->input->post('id_meja'),
                'status_meja' => '1',
            );
            $this->m_transaksi->simpan_transaksi($data);
            $this->m_transaksi->simpan_status($status);
            //simpan ke tabel rinci transaksi
            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $data_rinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_menu' => $item['id'],
                    // 'id_meja' => $this->input->post('id_meja'),
                    'qty' => $this->input->post('qty' . $i++),
                );
                $this->m_transaksi->simpan_rinci_transaksi($data_rinci);
            }

            $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses !!!');
            $this->cart->destroy();
            redirect('pesanan_saya');
        }
    }
    public function update_status($id_transaksi = NULL)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_bayar' => '1'
        );
        $this->m_transaksi->update_status($data);
        $this->session->set_flashdata('pesan', 'Data berhasil DiUpdate !!!');
        redirect('pesanan_saya');
    }
}
