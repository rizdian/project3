<?php

/**
 * Created by PhpStorm.
 * User: Ancient
 * Date: 14/12/2017
 * Time: 11:07
 */
class Peminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth', 'form_validation', 'Template'));
        $this->load->model(['Peminjaman_model', 'Kendaraan_model', 'Detail_Peminjaman_model']);
        /*if (!$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }*/
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
            'karyawan' => $karyawan,
            'kendaraan' => $kendaraan,
        );
        $this->template->addJS(base_url('assets/js/peminjaman.js'));
        $this->template->show("transaksi", "formulir_form", $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $karyawan = $this->Karyawan_model->get_by_id($this->input->post('karyawan', TRUE));
            $data = array(
                'tgl_pinjam' => $this->input->post('tgl_pinjam', TRUE),
                'tgl_kembali' => $this->input->post('tgl_kembali', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'id_kendaraan' => $this->input->post('kendaraan', TRUE),
                'id_peminjam' => $this->input->post('karyawan', TRUE),
                'flag' => $karyawan->flag + 1,
            );

            $insertId = $this->Peminjaman_model->insert($data);
            $intFlag = (integer)$karyawan->flag;
            $dataDetail = array(
                'id_peminjaman' => $insertId,
            );
            for ($i = $intFlag; $i < 4;) {
                $dataDetail['flag'] = ++$i;
                $this->save_detail($dataDetail);
            }

            $dataKendaraan = array(
                'status' => '1'
            );
            $this->Kendaraan_model->update($this->input->post('kendaraan', TRUE), $dataKendaraan);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('peminjaman'));
        }
    }

    public function data()
    {
        $peminjaman = $this->Peminjaman_model->get_all();

        $data = array(
            'peminjaman_data' => $peminjaman,
            'start' => 0
        );

        $this->template->addJS(base_url('assets/js/peminjaman.js'));
        $this->template->show("transaksi", "formulir_list", $data);
    }

    public function dataDetail($id)
    {
        $dataDetail = $this->Detail_Peminjaman_model->get_by_id($id);
        $data = array(
            'detail_data' => $dataDetail,
            'start' => 0
        );
        if ($data) {
            $this->template->show("transaksi", "formulir_listdetail", $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman/data'));
        }
    }

    public function verifikasi()
    {
        $user = $this->_getKryByLogin();
        $peminjaman = $this->Peminjaman_model->get_status_list($user->flag);

        $data = array(
            'peminjaman_data' => $peminjaman,
            'start' => 0
        );

        $this->template->addJS(base_url('assets/js/peminjaman.js'));
        $this->template->show("transaksi", "formulir_verifikasi", $data);
    }

    public function verifikasiAcc($id)
    {
        $user = $this->_getKryByLogin();
        $flag = $this->_getFromPeminjamanId($id);
        $peminjaman = $this->Peminjaman_model->get_acc($id, $user->id);
        if ($peminjaman) {
            $dataUpdateDetail = array(
                'id_karyawan' => $user->id,
                'status' => 1,
            );
            $this->Detail_Peminjaman_model->update($id,$flag->flag,$dataUpdateDetail);
            $this->session->set_flashdata('message', 'Peminjaman Telah Di Acc');
            redirect(site_url('peminjaman/verifikasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman/verifikasi'));
        }
    }

    public function verifikasiTolak($id)
    {
        $user = $this->_getKryByLogin();
        $mobil = $this->_getFromPeminjamanId($id);

        $peminjaman = $this->Peminjaman_model->get_tolak($id, $user->id);
        if ($peminjaman) {
            $dataUpdateDetail = array(
                'id_karyawan' => $user->id,
                'status' => 2,
            );
            $this->Detail_Peminjaman_model->update($id,$mobil->flag,$dataUpdateDetail);

            $dataKendaraan = array(
                'status' => '0'
            );
            $this->Kendaraan_model->update($mobil->id_kendaraan, $dataKendaraan);

            $this->session->set_flashdata('message', 'Peminjaman Telah Di Tolak');
            redirect(site_url('peminjaman/verifikasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman/verifikasi'));
        }
    }

    public function _rules()
    {

        $this->form_validation->set_rules('karyawan', 'karyawan', 'trim|required');
        $this->form_validation->set_rules('kendaraan', 'kendaraan', 'trim|required');
        $this->form_validation->set_rules('tgl_pinjam', 'tanggal pinjam', 'trim|required');
        $this->form_validation->set_rules('tgl_kembali', 'tanggal kembali', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_rules('flag', 'flag', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
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

    public function save_detail($data)
    {
        $this->Detail_Peminjaman_model->insert($data);
    }

}