<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_meja extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_daftar_meja');

        //Load Dependencies

    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Daftar Meja',
            'daftar_meja' => $this->m_daftar_meja->get_all_data(),
            'isi' => 'v_daftar_meja',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    // Add a new item
    public function add()
    {
        $data = array(
            'no_meja' => $this->input->post('no_meja'),
            // 'tgl_status' => date('Y-m-d'),
            'status_meja' => '0',
        );
        $this->m_daftar_meja->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        redirect('daftar_meja');
    }
    //Update one item
    public function edit($id_meja = NULL)
    {
        $data = array(
            'id_meja' => $id_meja,
            'no_meja' => $this->input->post('no_meja'),
        );
        $this->m_daftar_meja->edit($data);
        $this->session->set_flashdata('pesan', 'Data berhasil DiUpdate !!!');
        redirect('daftar_meja');
    }
    //update status meja
    public function update($id_meja = NULL)
    {
        $data = array(
            'id_meja' => $id_meja,
            'status_meja' => '0',
        );
        $this->m_daftar_meja->edit($data);
        $this->session->set_flashdata('pesan', 'Data berhasil DiUpdate !!!');
        redirect('daftar_meja');
    }
    //update meja menjadi active
    public function active($id_meja = NULL)
    {
        $data = array(
            'id_meja' => $id_meja,
            'status_meja' => '1',
        );
        $this->m_daftar_meja->edit($data);
        $this->session->set_flashdata('pesan', 'Data berhasil DiUpdate !!!');
        redirect('daftar_meja');
    }
    //update all
    public function update_all()
    {
        $data = array(
            // 'id_meja' => $id_meja,
            'status_meja' => '0',
        );
        $this->m_daftar_meja->update_all($data);
        $this->session->set_flashdata('pesan', 'Semua Data berhasil DiUpdate !!!');
        redirect('daftar_meja');
    }
    //Delete one item
    public function delete($id_meja = NULL)
    {
        $data = array('id_meja' => $id_meja);
        $this->m_daftar_meja->delete($data);

        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('daftar_meja');
    }
}
