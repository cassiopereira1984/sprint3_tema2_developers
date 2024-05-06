<?php


require_once(__DIR__ . "/../models/ModelTask.php");

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


     public function deleteTaskAction() {
        // Verificar si se recibió una solicitud POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener el ID de la tarea a eliminar desde el formulario
            $taskId = $_POST['id']; // Asegúrate de sanitizar y validar la entrada aquí
            
            // Llamar al método para eliminar la tarea en el modelo
            $this->modelTask->deleteTask($taskId);
    
            // Redireccionar a la página principal u otra página deseada
            header("Location: /index");
            exit();
        }
    }
}