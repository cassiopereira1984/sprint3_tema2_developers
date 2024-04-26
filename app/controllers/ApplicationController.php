<?php

//llamar a la carpte model archivo.
require_once(__DIR__ . "/../models/ModelTask.php");

/**
 * Base controller for the application.
 * Add general things in this controller.
 * testestestesadasdasasdad
 */

 //crear a la class app control segun sale abajo y crear la function construct 
 //$this->model = new Model() para llamar a la function en el models 
class ApplicationController extends Controller 
{
	
    private $modelTask;

    public function __construct(){

        $this->modelTask = new ModelTask();
    }

    public function createTaskAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //recoger los datos introducidos en formulario de nueva tarea
            $description = $this->_getParam("description");
            $status = $this->_getParam("status");
            $dateIni = date_create()->format('Y-m-d');
            $dateEnd = date_create($_POST["date_end"])->format('Y-m-d');
            $user = $this->_getParam("user");


            $newTask = [
                'id' => $this->modelTask->getID(),//hay que crear el metodo getID en ModelTask.php
                'description' => $description,
                'status' => $status,
                'date_ini' => $dateIni,
                'date_end' => $dateEnd,
                'user' => $user
            ];


            $this->modelTask->createTask($newTask);
            header("Location: " . $this->_baseUrl() . "/index");  /*devuelve al usuario a la pagina principal, 
                                                                    si queremos crear un mensaje de confirmacion 
                                                                    o algo asi, habría que cambiar el "/index" a 
                                                                    la ruta de ese script*/
            exit(); /* Esto asegura que no se ejecute ningún código adicional después de la redirección. */
        }


    }
}