<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{

    public $table = 'karyawan';
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
    function total_rows($q = NULL)
    {
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
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->select('karyawan.*,divisi.nama');
        $this->db->join('divisi', 'karyawan.divisi = divisi.id');
        $this->db->order_by('karyawan.'.$this->id, $this->order);
        $this->db->like('karyawan.id', $q);
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

    function get_not_in_login()
    {
        $query = $this->db->query("select karyawan.* from karyawan
                                    left join users
                                    ON karyawan.id = users.id_karyawan
                                    where users.id_karyawan IS NULL");

        return $query->result();
    }

    function get_not_in_formulir()
    {
        $query = $this->db->query("SELECT 		karyawan.* 
                                    FROM 			karyawan
                                    LEFT JOIN 	peminjaman
                                    ON 			karyawan.id = peminjaman.id_peminjam
                                    WHERE 		peminjaman.id_peminjam IS NULL 
                                    OR 			peminjaman.status_kembali = '1' 
                                    AND 			karyawan.id NOT IN (SELECT 	DISTINCT id_peminjam 
                                                                        FROM 		peminjaman 
                                                                        WHERE 	status_kembali = '0') ");
        return $query->result();
    }

}

/* End of file Karyawan_model.php */
/* Location: ./application/models/Karyawan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-10 05:05:49 */
/* http://harviacode.com */