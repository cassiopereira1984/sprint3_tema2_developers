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

    public function indexAction()
    {

        $this->modelTask->allTask();
        $tasks = $this->modelTask->allTask();
        $this->view->data = $tasks;

    }
    public function createTaskAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {/*$_SERVER['REQUEST_METHOD']: El método de solicitud HTTP utilizado 
                                                    (por ejemplo, GET, POST, etc.).*/
            //recoger los datos introducidos en formulario de nueva tarea
            $description = $this->$_POST("description");
            $status = $this->$_POST("status");
            $dateIni = date_create($_POST)->format('Y-m-d');
            $dateEnd = date_create($_POST["date_end"])->format('Y-m-d');
            $user = $this->$_POST("user");// Tener en cuenta cambiar "()" por "[]"


            $newTask = [
                'id' => $this->modelTask->newId(),//hay que crear el metodo getID en ModelTask.php
                'description' => $description,
                'status' => $status,
                'date_ini' => $dateIni,
                'date_end' => $dateEnd,
                'user' => $user
            ];


            $this->modelTask->createTask($newTask);
            return header("Location: index.phtml"); /*devuelve al usuario a la pagina principal, 
                                                                    si queremos crear un mensaje de confirmacion 
                                                                    o algo asi, habría que cambiar el "/index" a 
                                                                    la ruta de ese script*/
            exit(); /* Esto asegura que no se ejecute ningún código adicional después de la redirección. */
        }


    }
}