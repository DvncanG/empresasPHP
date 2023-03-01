<?php

require_once __DIR__ . '/../db/DB.php';

class AppModel
{
    private $db;

    //Constructor
    public function __construct()
    {
        $this->db = new DB();
    }


    public function getUsuarios(){

        $query = $this->db->query('SELECT * FROM usuarios');
         unset($this->db);
         return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    public function deleteUsuario($id){

        $query = $this->db->query('DELETE FROM usuarios WHERE Codigo=:Codigo', [':Codigo' => $id]);
         unset($this->db);
         return $query->fetchAll();
    }
}