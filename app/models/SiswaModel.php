<?php

class SiswaModel
{
    private $table = 'siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getSiswaByNISN($NISN)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nisn=:nisn ');
        $this->db->bind('nisn', $NISN);
        return $this->db->single();
    }

    public function tambahSiswa($data)
    {
        $this->db->query("INSERT INTO siswa VALUES (:nisn, :nis, :nama, :id_kelas, :alamat, :no_telp, :id_spp)");
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id_kelas', $data['id_kelas']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->bind('id_spp', $data['id_spp']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusSiswa($NISN)
    {
        $this->db->query("DELETE FROM siswa WHERE nisn = :nisn");
        $this->db->bind('nisn', $NISN);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahSiswa($data)
    {
        $this->db->query("UPDATE siswa SET nis = :nis, nama = :nama, id_kelas = :id_kelas, alamat = :alamat, no_telp = :no_telp, id_spp = :id_spp WHERE nisn = :nisn");
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id_kelas', $data['id_kelas']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->bind('id_spp', $data['id_spp']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
