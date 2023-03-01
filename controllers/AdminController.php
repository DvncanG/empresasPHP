<?php
    
    class AdminController {

        private $view;
        private $model;

        public function __construct() {
            $this->model = new AppModel();
            $this->view = new AdminView();
        }

        public function listUsuarios() {
            $respuesta = $this->model->getUsuarios();
            $this->view->printUsuarios($respuesta);
        }

        public function deleteUsuario(){
            if($_SESSION["role"]==1){
                $respuesta = $this->model->deleteUsuario($_POST["codigoBorrar"]);
                var_dump($respuesta);
                die("saludos");

            }
        }

        public function listEmpresas(){



        }

}
