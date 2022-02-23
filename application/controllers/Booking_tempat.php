<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_tempat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_daftar_meja');
        $this->load->model('m_booking');
        $this->load->model('m_transaksi');
    }

    public function index()
    {
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Booking Tempat',
            'booking_tempat' => $this->m_booking->booking_tempat(),
            'belum_bayar' => $this->m_booking->belum_bayar(),
            'booking_selesai' => $this->m_booking->booking_selesai(),
            'isi' => 'v_booking_tempat',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
    public function add_booking()
    {
        $data = array(
            'title' => 'Tambah Booking',
            'daftar_meja' => $this->m_daftar_meja->get_all_data(),
            'booking_selesai' => $this->m_booking->booking_selesai(),
            'belum_bayar' => $this->m_booking->belum_bayar(),
            // 'diproses' => $this->m_transaksi->diproses(),
            // 'selesai' => $this->m_transaksi->selesai(),
            'isi' => 'v_add_booking',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
    public function add()
    {

        $this->form_validation->set_rules('atas_nama', 'atas_nama', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        // $this->form_validation->set_rules('no_meja', 'Nomor Meja', 'required', array(
        //     'required' => '%s Harus diisi !!!'
        // ));
        $this->form_validation->set_rules('banyak_orang', 'banyak orang', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('tgl_booking', 'tanggal booking', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Booking',
                // 'daftar_meja' => $this->m_daftar_meja->get_all_data(),
                'isi' => 'v_add_booking',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            //simpan ke table transaksi
            $book = $this->input->post('dp_booking');
            $borang = $this->input->post('banyak_orang');
            $bo = $this->input->post('banyak_orang');
            $dp = $bo * 10000;
            // $jam = $this->input->post('jam');
            // $ubah_jam = implode("-", $jam);
            $checkboxes = $this->input->post('no_meja');
            $no_meja = implode(",", $checkboxes);
            // $checktgl = $this->input->post('tgl_booking');
            // $checklokasi = $this->input->post('lokasi');
            // $checkno = $no_meja;
            // $check_meja = $checktgl . $checkno . $checklokasi;
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'atas_nama' => $this->input->post('atas_nama'),
                'tgl_booking' => $this->input->post('tgl_booking'),
                'no_hp' => $this->input->post('no_hp'),
                'banyak_orang' => $this->input->post('banyak_orang'),
                'lokasi' => $this->input->post('lokasi'),
                'no_meja' => $no_meja,
                'status_booking' => '0',
                'status_bayar' => '0',
                'dp_booking' => $dp,
                // 'check_meja' => $check_meja,
                'jam' => $this->input->post('jam')
            );
            $this->m_booking->simpan_booking($data);
            redirect('booking_tempat');
        }
    }
    public function bayar($id_booking)
    {
        $this->form_validation->set_rules('atas_nama_bayar', 'Atas Nama', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('no_rek', 'nomor rekening', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));



        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/bukti_bayar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '1000';
            $this->upload->initialize($config);
            $field_name = 'bukti_bayar';
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Pembayaran',
                    'bookingan' => $this->m_booking->detail_booking($id_booking),
                    'rekening' => $this->m_transaksi->rekening(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'v_bayar_booking',
                );
                $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/bukti_bayar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_booking' => $id_booking,
                    'atas_nama_bayar' => $this->input->post('atas_nama_bayar'),
                    'nama_bank' => $this->input->post('nama_bank'),
                    'no_rek' => $this->input->post('no_rek'),
                    'status_bayar' => '1',
                    'bukti_bayar' => $upload_data['uploads']['file_name'],

                );
                $update = array(
                    'dp_booking' => $this->input->post('dp_booking'),
                );
                $this->m_booking->upload_buktibayar($data);
                $this->session->set_flashdata('pesan', 'Bukti Pembayaran Berhasil di Upload!!!');
                redirect('booking_tempat');
            }
        }

        $data = array(
            'title' => 'Pembayaran',
            'bookingan' => $this->m_booking->detail_booking($id_booking),
            'rekening' => $this->m_transaksi->rekening(),
            'isi' => 'v_bayar_booking',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}
