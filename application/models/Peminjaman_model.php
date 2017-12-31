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
        $query = $this->db->query("SELECT p.*, ke.no_polisi , ke.nama, ka.nama_depan, ka.nama_belakang, ku.nama_depan AS d_penyetuju, ku.nama_belakang AS b_penyetuju
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

    function get_jumlah_status($id)
    {
        $query = $this->db->query("SELECT *
                                     FROM peminjaman
                                    WHERE flag = '".$id."'");
        $hasil = $query->num_rows();
        return $hasil;
    }

    function get_status_list($flag)
    {
        $query = $this->db->query("SELECT p.*, ke.no_polisi , ke.nama, ka.nama_depan, ka.nama_belakang, ku.nama_depan AS penyetuju
                                          FROM peminjaman p
                                    INNER JOIN kendaraan ke
                                            ON p.id_kendaraan = ke.id
                                    INNER JOIN karyawan ka
                                            ON p.id_peminjam = ka.id
                                    LEFT JOIN karyawan ku
                                            ON p.id_penyetuju = ku.id
                                          WHERE flag = $flag");
        return $query->result();
    }

    function get_acc($idPeminjam, $idPenytuju)
    {
        return $this->db->query(" UPDATE  peminjaman 
                                  SET     flag = flag+1, id_penyetuju = " . $idPenytuju . " 
                                  WHERE   id = " . $idPeminjam . "");
    }

    function get_tolak($idPeminjam, $idPenytuju)
    {
        return $this->db->query("UPDATE peminjaman SET flag = 0,status_kembali = '1',id_penyetuju = " . $idPenytuju . " WHERE id = " . $idPeminjam . "");
    }
}