<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_booking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_daftar_booking');
    }


    public function index()
    {
        $data = array(
            'title' => 'Daftar Booking',
            'daftar_booking' => $this->m_daftar_booking->daftar_booking(),
            'booking_diproses' => $this->m_daftar_booking->booking_diproses(),
            'booking_selesai' => $this->m_daftar_booking->booking_selesai(),
            'isi' => 'v_daftar_booking',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    //menu list booking
    public function booking_selesai()
    {
        $data = array(
            'title' => 'Booking Selesai',
            'booking_selesai' => $this->m_daftar_booking->booking_selesai(),
            'isi' => 'v_daftar_booking_selesai',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    //delete list booking
    public function delete($id_booking = NULL)
    {
        //hapus gambar
        $booking_selesai = $this->m_daftar_booking->booking_selesai();
        if ($booking_selesai->bukti_bayar != "") {
            unlink('./assets/gambar/' . $booking_selesai->bukti_bayar);
        }
        //end hapus bukti bayar
        $data = array('id_booking' => $id_booking);
        $this->m_daftar_booking->delete($data);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('daftar_booking/booking_selesai');
    }
    public function proses($id_booking)
    {
        $data = array(
            'id_booking' => $id_booking,
            'status_booking' => '1',
            // 'dp_booking' => $this->input->get('dp_booking')
        );
        $this->m_daftar_booking->update_booking($data);
        $this->session->set_flashdata('pesan', 'Bookingan Berhasil!!!');

        redirect('daftar_booking');
    }
    public function selesai($id_booking)
    {
        $data = array(
            'id_booking' => $id_booking,
            'status_booking' => '2',
        );
        $this->m_daftar_booking->update_booking($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil telah selesai!!!');

        redirect('daftar_booking');
    }
}

/* End of file Controllername.php */
