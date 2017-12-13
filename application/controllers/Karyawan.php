<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
        $this->load->library('Template');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'karyawan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'karyawan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'karyawan/index.html';
            $config['first_url'] = base_url() . 'karyawan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Karyawan_model->total_rows($q);
        $karyawan = $this->Karyawan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'karyawan_data' => $karyawan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->show("karyawan", "karyawan_list", $data);
        //$this->load->view('karyawan/karyawan_list', $data);
    }

    public function read($id)
    {
        $row = $this->Karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nip' => $row->nip,
                'no_ktp' => $row->no_ktp,
                'nama_depan' => $row->nama_depan,
                'nama_tengah' => $row->nama_tengah,
                'nama_belakang' => $row->nama_belakang,
                'tempat_lahir' => $row->tempat_lahir,
                'tanggal_lahir' => $row->tanggal_lahir,
                'alamat' => $row->alamat,
                'tahun_masuk' => $row->tahun_masuk,
                'status' => $row->status,
                'lama_kontrak' => $row->lama_kontrak,
                'divisi' => $row->divisi,
            );
            $this->template->show("karyawan", "karyawan_read", $data);
            //$this->load->view('karyawan/karyawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('karyawan/create_action'),
            'id' => set_value('id'),
            'nip' => set_value('nip'),
            'no_ktp' => set_value('no_ktp'),
            'nama_depan' => set_value('nama_depan'),
            'nama_tengah' => set_value('nama_tengah'),
            'nama_belakang' => set_value('nama_belakang'),
            'tempat_lahir' => set_value('tempat_lahir'),
            'tanggal_lahir' => set_value('tanggal_lahir'),
            'alamat' => set_value('alamat'),
            'tahun_masuk' => set_value('tahun_masuk'),
            'status' => set_value('status'),
            'lama_kontrak' => set_value('lama_kontrak'),
            'divisi' => set_value('divisi'),
        );
        $this->template->addJS(base_url('assets/js/karyawan.js'));
        $this->template->show("karyawan", "karyawan_form", $data);
//        $this->load->view('karyawan/karyawan_form', $data);
    }

    public function create_action()
    {
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

    public function update($id)
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('karyawan/update_action'),
                'id' => set_value('id', $row->id),
                'nip' => set_value('nip', $row->nip),
                'no_ktp' => set_value('no_ktp', $row->no_ktp),
                'nama_depan' => set_value('nama_depan', $row->nama_depan),
                'nama_tengah' => set_value('nama_tengah', $row->nama_tengah),
                'nama_belakang' => set_value('nama_belakang', $row->nama_belakang),
                'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
                'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
                'alamat' => set_value('alamat', $row->alamat),
                'tahun_masuk' => set_value('tahun_masuk', $row->tahun_masuk),
                'status' => set_value('status', $row->status),
                'lama_kontrak' => set_value('lama_kontrak', $row->lama_kontrak),
                'divisi' => set_value('divisi', $row->divisi),
            );
            $this->template->addJS(base_url('assets/js/karyawan.js'));
            $this->template->show("karyawan", "karyawan_form", $data);
//            $this->load->view('karyawan/karyawan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
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

            $this->Karyawan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('karyawan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $this->Karyawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nip', 'nip', 'trim|required|is_unique[karyawan.nip]');
        $this->form_validation->set_rules('no_ktp', 'no ktp', 'trim|required|is_unique[karyawan.no_ktp]');
        $this->form_validation->set_rules('nama_depan', 'nama depan', 'trim|required');
        $this->form_validation->set_rules('nama_tengah', 'nama tengah', 'trim');
        $this->form_validation->set_rules('nama_belakang', 'nama belakang', 'trim');
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('tahun_masuk', 'tahun masuk', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('lama_kontrak', 'lama kontrak', 'trim|required');
        $this->form_validation->set_rules('divisi', 'divisi', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-10 05:05:49 */
/* http://harviacode.com */