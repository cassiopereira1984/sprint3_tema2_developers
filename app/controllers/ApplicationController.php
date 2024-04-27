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


	public function deleteTaskAction(): void
    {
        $id = ((int)$this->_getParam('id'));

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) { //verifica si se ha enviado la solicitud
            $this->modelTask->deleteTask($id); //elimina la task;
            header("Location: " . $this->_baseUrl());
            exit();
        }
    }
}