<?php

/**
 * Created by PhpStorm.
 * User: Ancient
 * Date: 14/12/2017
 * Time: 11:07
 */
class peminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth', 'form_validation','Template'));
        $this->load->model(['Peminjaman_model','Kendaraan_model']);
    }
    public function index()
    {
        $this->load->model(['Karyawan_model']);

        $karyawan = $this->Karyawan_model->get_not_in_formulir();
        $kendaraan = $this->Kendaraan_model->get_available();

        $data = array(
            'button' => 'Create',
            'action' => site_url('peminjaman/create_action'),
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
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tgl_pinjam' => $this->input->post('tgl_pinjam', TRUE),
                'tgl_kembali' => $this->input->post('tgl_kembali', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'id_kendaraan' => $this->input->post('kendaraan', TRUE),
                'id_peminjam' => $this->input->post('karyawan', TRUE),
            );

            $this->Peminjaman_model->insert($data);
            $data = array(
                'status' => '1'
            );
            $this->Kendaraan_model->update($this->input->post('kendaraan', TRUE), $data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('peminjaman'));
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