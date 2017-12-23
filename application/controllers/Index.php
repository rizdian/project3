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
        $this->load->model(['Karyawan_model','Kendaraan_model','Peminjaman_model']);


        $data = [
            't_persetujuan' => $this->Peminjaman_model->get_jumlah_status(0),
            't_peminjaman' => $this->Peminjaman_model->total_rows(),
            't_kendaraan'  => $this->Kendaraan_model->get_count_available(),
            't_kry' => $this->Karyawan_model->total_rows()
        ];

        $this->template->show("", "halo", $data);
    }
}