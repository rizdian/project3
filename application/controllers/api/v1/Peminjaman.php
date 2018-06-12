<?php
/**
 * Created by PhpStorm.
 * User: NEVIIM-RIZDIAN
 * Date: 12/06/2018
 * Time: 11.35
 */
require APPPATH . 'controllers/api/Rest.php';

class Peminjaman extends Rest
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->model(['Karyawan_model', 'Peminjaman_model']);
        $this->load->database();
        $this->cektoken();
    }

    function index_get() {
        $data = $this->Karyawan_model->get_all();

        $this->response(array("data" => $data,'status'=>'success',), 200);

        $user = $this->_getKryByLogin();
        $peminjaman = $this->Peminjaman_model->get_status_list($user->flag);

        $this->response($peminjaman, 200);
    }

    public function _getKryByLogin()
    {
        $isLogin = $this->ion_auth->user()->row()->id_karyawan;
        $getUser = $this->Karyawan_model->get_by_id($isLogin);
        if ($getUser) return $getUser;
        else return null;
    }

    public function _getFromPeminjamanId($id)
    {
        $data = $this->Peminjaman_model->get_by_id($id);
        if ($data) {
            return $data;
        }
        return null;
    }
}