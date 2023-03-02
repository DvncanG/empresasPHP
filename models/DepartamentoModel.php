<?php
require_once __DIR__ . '/../db/DB.php';

class DepartamentoModel
{
    private $db;

    //Constructor
    public function __construct()
    {
        $this->db = new DB();
    }


    public function getDepartamentosNumber()
    {

        $query = $this->db->query('select departamentos.*, count(empleados.CodEmple) as n_empleados from departamentos join empleados on (departamentos.CodDept = empleados.Departamento) group by departamentos.CodDept');
        unset($this->db);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}