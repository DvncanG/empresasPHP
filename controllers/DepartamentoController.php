<?php

class DepartamentoController
{

    //Instanciia del modelo y de la vista correspondiente:
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new DepartamentoModel();
        $this->view = new AdminView();
    }

    public function listDepartamentos(){
        $departamentos = $this->model->getDepartamentosNumber();
        $this->view->printUsuarioFromDepartamentos($departamentos);
    }
}