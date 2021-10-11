<?php

class UserModel
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function userLogin($inputUsername)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username ');
        $this->db->bind('username', $inputUsername);
        return $this->db->single();
    }
}
