<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{

    public $table = 'peminjaman';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows()
    {
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('nip', $q);
        $this->db->or_like('no_ktp', $q);
        $this->db->or_like('nama_depan', $q);
        $this->db->or_like('nama_tengah', $q);
        $this->db->or_like('nama_belakang', $q);
        $this->db->or_like('tempat_lahir', $q);
        $this->db->or_like('tanggal_lahir', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('tahun_masuk', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('lama_kontrak', $q);
        $this->db->or_like('divisi', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_status_0(){
        $query = $this->db->query("SELECT *
                                     FROM peminjaman
                                    WHERE status_pinjam = '0'");
        $hasil = $query->num_rows();
        return $hasil;
    }
}