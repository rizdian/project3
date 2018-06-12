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
        $this->load->model(['Karyawan_model', 'Peminjaman_model', 'Detail_Peminjaman_model','Kendaraan_model']);
        $this->cektoken();
    }

    function index_get()
    {
        $user = $this->_getKryByLogin();
        $data = $this->Peminjaman_model->get_status_list($user->flag);
        $this->response([
            'status' => 1,
            'message' => 'Sukses',
            'data' => $data
        ], REST_Controller::HTTP_OK);
    }

    function all_get()
    {
        $data = $this->Peminjaman_model->get_all();
        $this->response([
            'status' => 1,
            'message' => 'Sukses',
            'data' => $data
        ], REST_Controller::HTTP_OK);
    }

    public function acc_post($id)
    {
        $user = $this->_getKryByLogin();
        $flag = $this->_getFromPeminjamanId($id);
        $peminjaman = $this->Peminjaman_model->get_acc($id, $user->id);
        if ($peminjaman) {
            $dataUpdateDetail = array(
                'id_karyawan' => $user->id,
                'status' => 1,
            );
            $this->Detail_Peminjaman_model->update($id, $flag->flag, $dataUpdateDetail);
            $this->_response(1, 'Peminjaman Telah Di Acc', REST_Controller::HTTP_OK);
        } else {
            $this->_response(0, 'Peminjaman Gagal Di Acc', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function reject_post($id)
    {
        $this->form_validation->set_rules('reason', 'reason', 'trim|required');
        if ($this->form_validation->run() === TRUE){

            $reason = $this->input->post('reason', TRUE);
            $user = $this->_getKryByLogin();
            $mobil = $this->_getFromPeminjamanId($id);
            $peminjaman = $this->Peminjaman_model->get_tolak($id, $user->id, $reason);
            if ($peminjaman) {
                $dataUpdateDetail = array(
                    'id_karyawan' => $user->id,
                    'status' => 2,
                );
                $this->Detail_Peminjaman_model->update($id, $mobil->flag, $dataUpdateDetail);

                $dataKendaraan = array(
                    'status' => '0'
                );
                $this->Kendaraan_model->update($mobil->id_kendaraan, $dataKendaraan);

                $this->_response(1, 'Peminjaman Telah Di Tolak', REST_Controller::HTTP_OK);
            } else {
                $this->_response(0, 'Peminjaman Gagal Di Tolak', REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $this->_response(0, 'Alasan Tidak Boleh Kosong', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    private function _getKryByLogin()
    {
        $isLogin = $this->ion_auth->user()->row()->id_karyawan;
        $getUser = $this->Karyawan_model->get_by_id($isLogin);

        return ($getUser ? $getUser : null);
    }

    private function _getFromPeminjamanId($id)
    {
        $data = $this->Peminjaman_model->get_by_id($id);
        return ($data ? $data : null);
    }

    function _response($status, $message, $code)
    {
        $this->response([
            'status' => $status,
            'message' => $message
        ], $code);
    }
}