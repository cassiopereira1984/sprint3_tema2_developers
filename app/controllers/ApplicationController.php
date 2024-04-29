<?php

//llamar a la carpte model archivo.
require_once(__DIR__ . "/../models/TaskModel.php");

/**
 * Base controller for the application.
 * Add general things in this controller.
 * testestestesadasdasasdad
 */

 //crear a la class app control segun sale abajo y crear la function construct 
 //$this->model = new Model() para llamar a la function en el models 
class ApplicationController extends Controller 
{
	function updateTaskAcciton() 
    {
        $task = new ModelTask;
        $updateTask = [];
        $id = $_GET["id"]; 
        $oneTask = $task->readTask($id);
        $this->view->oneTask=$oneTask; //chequear esta linea;
        
        if(!empty($_Post)) {
            $updateTask =
            [
                'id' => (int)$id,
                'description' => $_POST['description'],
                'status' => $_POST['status'],
                'date_ini' => $_POST['dateIni'],
                'date_end' => $_POST['dateEnd'],
                'user' => $_POST['user']
            ];
            $task->updateTask($updateTask);
        }
        return header ('location:./'); //definir ruta de retorno
        exit();
    }
}