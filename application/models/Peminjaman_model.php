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
        $query = $this->db->query("SELECT p.*, ke.no_polisi , ke.nama, ka.nama_depan, ka.nama_belakang, ku.nama_depan AS penyetuju
                                          FROM peminjaman p
                                    INNER JOIN kendaraan ke
                                            ON p.id_kendaraan = ke.id
                                    INNER JOIN karyawan ka
                                            ON p.id_peminjam = ka.id
                                    LEFT JOIN karyawan ku
                                            ON p.id_penyetuju = ku.id");
        return $query->result();
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
        $query = $this->db->get($this->table)->result();
        return count($query);
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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

    function get_status_list_0(){
        $query = $this->db->query("SELECT p.*, ke.no_polisi , ke.nama, ka.nama_depan, ka.nama_belakang, ku.nama_depan AS penyetuju
                                          FROM peminjaman p
                                    INNER JOIN kendaraan ke
                                            ON p.id_kendaraan = ke.id
                                    INNER JOIN karyawan ka
                                            ON p.id_peminjam = ka.id
                                    LEFT JOIN karyawan ku
                                            ON p.id_penyetuju = ku.id
                                          WHERE status_pinjam = '0'");
        return $query->result();
    }

    function get_acc($id){
        $this->db->query("UPDATE peminjaman SET status_pinjam = '1' WHERE id = ".$id."");
    }
    function get_tolak($id){
        $this->db->query("UPDATE peminjaman SET status_pinjam = '2' WHERE id = ".$id."");
    }
}