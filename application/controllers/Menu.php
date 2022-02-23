<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_menu');
        $this->load->model('m_kategori');

        //Load Dependencies

    }

    // List all your items
    public function index($offset = 0)
    {
        $data = array(
            'title' => 'Daftar Menu',
            'menu' => $this->m_menu->get_all_data(),
            'isi' => 'menu/v_menu',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {

        $this->form_validation->set_rules('nama_menu', 'Nama menu', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('harga', 'Harga', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        //

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '1000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Tambah Menu',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'menu/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_menu' => $this->input->post('nama_menu'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name'],

                );
                $this->m_menu->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
                redirect('menu');
            }
        }

        $data = array(
            'title' => 'Tambah Menu',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi' => 'menu/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Update one item
    public function edit($id_menu = NULL)
    {
        $this->form_validation->set_rules('nama_menu', 'Nama menu', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('harga', 'Harga', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '5000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'id_menu' => $id_menu,
                    'title' => 'Edit Menu',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'menu' => $this->m_menu->get_data($id_menu),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'menu/v_edit',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                //hapus gambar
                $menu = $this->m_menu->get_data($id_menu);
                if ($menu->gambar != "") {
                    unlink('./assets/gambar/' . $menu->gambar);
                }
                //end hapus gambar
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_menu' => $id_menu,
                    'nama_menu' => $this->input->post('nama_menu'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name'],

                );
                $this->m_menu->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil ganti !!!');
                redirect('menu');
            }
            //jika tanpa ganti gambar
            $data = array(
                'id_menu' => $id_menu,
                'nama_menu' => $this->input->post('nama_menu'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),
                'deskripsi' => $this->input->post('deskripsi'),

            );
            $this->m_menu->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil ganti !!!');
            redirect('menu');
        }

        $data = array(
            'title' => 'Edit Menu',
            'kategori' => $this->m_kategori->get_all_data(),
            'menu' => $this->m_menu->get_data($id_menu),
            'isi' => 'menu/v_edit',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Delete one item
    public function delete($id_menu = NULL)
    {
        //hapus gambar
        $menu = $this->m_menu->get_data($id_menu);
        if ($menu->gambar != "") {
            unlink('./assets/gambar/' . $menu->gambar);
        }
        //end hapus gambar
        $data = array('id_menu' => $id_menu);
        $this->m_menu->delete($data);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('menu');
    }
}

/* End of file Controllername.php */
