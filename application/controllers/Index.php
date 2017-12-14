<?php

/**
 * Created by PhpStorm.
 * User: Ancient
 * Date: 13/12/2017
 * Time: 21:44
 */
class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth', 'form_validation','Template'));
    }
    public function index()
    {
        $this->load->model(['Karyawan_model','Kendaraan_model']);

        $karyawan = $this->Karyawan_model->get_not_in_formulir();
        $kendaraan = $this->Kendaraan_model->get_available();

        $data = array(
            'button' => 'Create',
            'action' => site_url('create_action'),
            'id' => set_value('id'),
            'tgl_pinjam' => set_value('tgl_pinjam'),
            'tgl_kembali' => set_value('tgl_kembali'),
            'keterangan' => set_value('keterangan'),
            'karyawan'  => $karyawan,
            'kendaraan' => $kendaraan,
        );
        $this->template->addJS(base_url('assets/js/peminjaman.js'));
        $this->template->show("transaksi", "formulir_form", $data);
    }
    public function create_action(){
        echo '<pre>';
        var_dump($this->input->post());
        exit;
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $data = array(
                'nip' => $this->input->post('nip', TRUE),
                'no_ktp' => $this->input->post('no_ktp', TRUE),
                'nama_depan' => $this->input->post('nama_depan', TRUE),
                'nama_tengah' => $this->input->post('nama_tengah', TRUE),
                'nama_belakang' => $this->input->post('nama_belakang', TRUE),
                'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'tahun_masuk' => $this->input->post('tahun_masuk', TRUE),
                'status' => $this->input->post('status', TRUE),
                'lama_kontrak' => $this->input->post('lama_kontrak', TRUE),
                'divisi' => $this->input->post('divisi', TRUE),
            );

            $this->Karyawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('karyawan'));
        }
    }

    public function _rules()
    {

        $this->form_validation->set_rules('karyawan', 'karyawan', 'trim|required');
        $this->form_validation->set_rules('kendaraan', 'kendaraan', 'trim|required');
        $this->form_validation->set_rules('tgl_pinjam', 'tanggal pinjam', 'trim|required');
        $this->form_validation->set_rules('tgl_kembali', 'tanggal kembali', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}