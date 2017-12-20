<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kendaraan_model');
        $this->load->library(array('ion_auth', 'form_validation','Template'));
        if (!$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'kendaraan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kendaraan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kendaraan/index.html';
            $config['first_url'] = base_url() . 'kendaraan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kendaraan_model->total_rows($q);
        $kendaraan = $this->Kendaraan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kendaraan_data' => $kendaraan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->addCSS(base_url('assets/plugins/datatables/dataTables.bootstrap.css'));
        $this->template->addJS(base_url('assets/plugins/datatables/jquery.dataTables.min.js'));
        $this->template->addJS(base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'));
        $this->template->addJS(base_url('assets/js/kendaraan.js'));
        $this->template->show("kendaraan", "kendaraan_list", $data);
    }

    public function read($id)
    {
        $txtStat = null;
        $row = $this->Kendaraan_model->get_by_id($id);
        if ($row) {
            if ($row->status == 0) $txtStat = 'Available';
            else $txtStat = 'Not-Available';
            $data = array(
                'id' => $row->id,
                'no_polisi' => $row->no_polisi,
                'nama' => $row->nama,
                'warna' => $row->warna,
                'foto' => $row->foto,
                'status' => $txtStat,
            );

            $this->template->show("kendaraan", "kendaraan_read", $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kendaraan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kendaraan/create_action'),
            'id' => set_value('id'),
            'no_polisi' => set_value('no_polisi'),
            'nama' => set_value('nama'),
            'warna' => set_value('warna'),
            'foto' => set_value('foto')
        );
        $this->template->addJS(base_url('assets/js/kendaraan.js'));
        $this->template->show("kendaraan", "kendaraan_form", $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->load->library('upload');
            $nmfile = "file_" . time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/images/'; //path folder
            $config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '2048'; //maksimum besar file 2M
            $config['max_width'] = '1288'; //lebar maksimum 1288 px
            $config['max_height'] = '768'; //tinggi maksimu 768 px
            $config['file_name'] = $nmfile; //nama yang terupload nantinya

            $this->upload->initialize($config);
            if ($_FILES['foto']['name']) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $data = array(
                        'no_polisi' => $this->input->post('no_polisi', TRUE),
                        'nama' => $this->input->post('nama', TRUE),
                        'warna' => $this->input->post('warna', TRUE),
                        'foto' => $gbr['file_name']
                    );

                    $this->Kendaraan_model->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success');
                    redirect(site_url('kendaraan'));
                } else {
                    $this->session->set_flashdata("message", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                    redirect(site_url('kendaraan'));
                }
            } else {
                $data = array(
                    'no_polisi' => $this->input->post('no_polisi', TRUE),
                    'nama' => $this->input->post('nama', TRUE),
                    'warna' => $this->input->post('warna', TRUE)
                );

                $this->Kendaraan_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('kendaraan'));
            }
        }
    }

    public function update($id)
    {
        $row = $this->Kendaraan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kendaraan/update_action'),
                'id' => set_value('id', $row->id),
                'no_polisi' => set_value('no_polisi', $row->no_polisi),
                'nama' => set_value('nama', $row->nama),
                'warna' => set_value('warna', $row->warna),
                'foto' => set_value('foto', $row->foto),
                'status' => set_value('status', $row->status),
            );
            $this->template->show("kendaraan", "kendaraan_form", $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kendaraan'));
        }
    }

    public function update_action()
    {
        $this->_rules(true);

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $this->load->library('upload');
            $nmfile = "file_" . time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $path = './assets/images/'; //path folder
            $config['upload_path'] = $path; //variabel path untuk config upload
            $config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '2048'; //maksimum besar file 2M
            $config['max_width'] = '1288'; //lebar maksimum 1288 px
            $config['max_height'] = '768'; //tinggi maksimu 768 px
            $config['file_name'] = $nmfile; //nama yang terupload nantinya

            $this->upload->initialize($config);

            $filelama = $this->input->post('filelama'); /* variabel file gambar lama */

            if ($_FILES['foto']['name']) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $data = array(
                        'no_polisi' => $this->input->post('no_polisi', TRUE),
                        'nama' => $this->input->post('nama', TRUE),
                        'warna' => $this->input->post('warna', TRUE),
                        'foto' => $gbr['file_name'],
                    );

                    @unlink($path . $filelama);//menghapus gambar lama, variabel dibawa dari form

                    $this->Kendaraan_model->update($this->input->post('id', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('kendaraan'));
                } else {
                    $this->session->set_flashdata('message', 'Update Record Failed');
                    redirect(site_url('kendaraan'));
                }
            } else {

                $data = array(
                    'no_polisi' => $this->input->post('no_polisi', TRUE),
                    'nama' => $this->input->post('nama', TRUE),
                    'warna' => $this->input->post('warna', TRUE),
                );
                $this->Kendaraan_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('kendaraan'));
            }
        }
    }

    public function delete($id)
    {
        $row = $this->Kendaraan_model->get_by_id($id);

        if ($row) {
            $path= './assets/images/';
            @unlink($path.$row->foto);
            $this->Kendaraan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kendaraan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kendaraan'));
        }
    }

    public function _rules($update = false)
    {
        if ($update){
            $this->form_validation->set_rules('no_polisi', 'no polisi', 'trim|required');
        }else{
            $this->form_validation->set_rules('no_polisi', 'no polisi', 'trim|required|is_unique[kendaraan.no_polisi]');
        }
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('warna', 'warna', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kendaraan.php */
/* Location: ./application/controllers/Kendaraan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-11 09:03:08 */
/* http://harviacode.com */