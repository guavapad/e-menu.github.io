
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
    }

    public function register()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('email', 'email', 'required|is_unique[tbl_pelanggan.email]', array(
            'required' => '%s Harus diisi !!!',
            'is_unique' => '%s Email ini sudah terdaftar!!'
        ));
        $this->form_validation->set_rules('password', 'password', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('ulangi_password', 'ulangi password', 'required|matches[password]', array(
            'required' => '%s Harus diisi !!!',
            'matches' => '%s password tidak sama!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Register Pelanggan',
                'isi' => 'v_register',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $data = array(
                //simpan ke table transaksi
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),

            );
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'selamat, register berhasil silahkan login');
            redirect('pelanggan/register');
        }
    }
    public function login()
    {
        $this->form_validation->set_rules('email', 'email', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));


        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }
        $data = array(
            'title' => 'login Pelanggan',
            'isi' => 'v_login_pelanggan',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
    public function logout()
    {
        $this->pelanggan_login->logout();
        redirect('home/index');
    }
    //profile pelanggan
    public function profile($id_pelanggan)
    {
        $data = array(
            'title' => 'profile ',
            'profile' => $this->m_pelanggan->profile($id_pelanggan),
            'isi' => 'v_profile',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
    //edit data pelanggan
    public function edit($id_pelanggan = NULL)
    {
        $data = array(
            'id_pelanggan' => $id_pelanggan,
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'email' => $this->input->post('email'),
        );
        $this->m_pelanggan->edit($data);
        $this->session->set_flashdata('pesan', 'Data berhasil DiUpdate !!!');
        redirect('pelanggan/profile');
    }
    //admin daftar pelanggan
    public function index($offset = 0)
    {
        $data = array(
            'title' => 'pelanggan',
            'pelanggan' => $this->m_pelanggan->get_all_data(),
            'isi' => 'v_pelanggan',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    public function delete($id_pelanggan = NULL)
    {
        $data = array('id_pelanggan' => $id_pelanggan);
        $this->m_pelanggan->delete($data);

        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('pelanggan');
    }
}

/* End of file Controllername.php */
