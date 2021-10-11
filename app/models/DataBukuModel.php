<?php

class DataBukuModel
{
    private $table = 'books';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataBuku()
    {
        $this->db->query('SELECT book_code, title, author, isbn_number, quantity, date_in FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function insertBuku($data)
    {
        $this->db->query("INSERT INTO books VALUES ('',:book_code, :title, :author, :isbn_number, :quantity, :date_in)");
        $this->db->bind('book_code', $data['book_code']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('author', $data['author']);
        $this->db->bind('isbn_number', $data['isbn_number']);
        $this->db->bind('quantity', $data['quantity']);
        $this->db->bind('date_in', date('Y-m-d'));
        $this->db->execute();

        return $this->db->rowCount();
    }
}
