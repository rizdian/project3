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
        $this->load->library(array('ion_auth', 'form_validation', 'Template'));
        /*if ($this->ion_auth->in_group('superadmin')) {
            redirect('auth', 'refresh');
        }*/
    }

    public function index()
    {
        $this->load->model(['Karyawan_model', 'Kendaraan_model', 'Peminjaman_model']);
        $isLogin = $this->ion_auth->user()->row()->id_karyawan;
        $getUser = $this->Karyawan_model->get_by_id($isLogin);

        $data = array();
        if ($getUser != null){
            $data['t_persetujuan'] = $this->Peminjaman_model->get_jumlah_status($getUser->flag);
        }

        $data = array(
            't_persetujuan' => 0,
            't_peminjaman' => $this->Peminjaman_model->total_rows(),
            't_kendaraan' => $this->Kendaraan_model->get_count_available(),
            't_kry' => $this->Karyawan_model->total_rows()
        );

        $this->template->show("", "halo", $data);
    }
}