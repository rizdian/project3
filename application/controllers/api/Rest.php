<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '../vendor/autoload.php';
require APPPATH . '/libraries/REST_Controller.php';

use \Firebase\JWT\JWT;

class Rest extends REST_Controller
{
    protected $secretkey = 'AncientRiz2018'; //ubah dengan kode rahasia apapun

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->model(['Karyawan_model']);
    }

    protected function getSecretKey()
    {
        return $this->secretkey;
    }

    // method untuk melihat token pada user
    public function generate_post()
    {
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

        $date = new DateTime();

        if ($this->form_validation->run() === TRUE) {
            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), false)) {

                $isLogin = $this->ion_auth->user()->row();
                $kry = $this->Karyawan_model->get_by_id($isLogin->id_karyawan);

                $response = array();

                $response['uid'] = $isLogin->id;
                $response['username'] = $isLogin->username;
                $response['idKry'] = $isLogin->id_karyawan;
                $response['nmDepan'] = null;
                $response['divisi'] = null;
                $response['flag'] = null;

                if ($isLogin->id_karyawan) {
                    $response['nmDepan'] = $kry->nama_depan;
                    $response['divisi'] = $kry->nama;
                    $response['flag'] = $kry->flag;
                }

                $response['iat'] = $date->getTimestamp(); //waktu di buat
                $response['exp'] = $date->getTimestamp() + 3600; //satu jam
                $output['token'] = JWT::encode($response, $this->secretkey);
                $this->response($output, REST_Controller::HTTP_OK);
            } else {
                $this->viewtokenfail();
            }
        } else {
            $this->response(array('status' => '0', 'message' => 'fail'), REST_Controller::HTTP_NO_CONTENT);
        }
    }

    // method untuk jika generate token diatas salah
    public function viewtokenfail()
    {
        $this->response([
            'status' => '0',
            'message' => 'Invalid Username Or Password'
        ], REST_Controller::HTTP_BAD_REQUEST);
    }

    // method untuk mengecek token setiap melakukan post, put, etc
    public function cektoken()
    {
        $this->load->model('Ion_auth_model');
        $jwt = $this->input->get_request_header('Authorization');

        try {
            $decode = JWT::decode($jwt, $this->secretkey, array('HS256'));

            if ($this->Ion_auth_model->identity_check($decode->username) > 0) {
                return true;
            }

        } catch (Exception $e) {
            exit(json_encode(array('status' => '0', 'message' => 'Invalid Token',)));
        }
    }

}