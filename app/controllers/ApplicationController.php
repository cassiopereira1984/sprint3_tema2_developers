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

        $allTasks = $this->modelTask->allTask();
        $this->view->allTasks = $allTasks;  

    }
    public function createTaskAction()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar los datos recibidos del formulario
            $description = $_POST['description'];
            $status = $_POST['status'];
            $date_ini = $_POST['date_ini'];
            $date_end = $_POST['date_end'];
            $user = $_POST['user'];
    
            // Crear una instancia del modelo de tarea
            $taskModel = new ModelTask();
    
            // Crear un array con los datos de la nueva tarea
            $newTask = [
                'description' => $description,
                'status' => $status,
                'date_ini' => $date_ini,
                'date_end' => $date_end,
                'user' => $user
            ];
    
            // Guardar la nueva tarea en el modelo
            $taskModel->createTask($newTask);
    
            // Redirigir al usuario a la página de inicio
            header("Location: ./"); 
            exit();
        }
            
        }


    }
}