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


     public function deleteTaskAction(): void
    {
        $modelTask = new ModelTask();
        $id = (int)$_GET['id'];

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) { //verifica si se ha enviado la solicitud
            $modelTask->deleteTask($id); //elimina la task;
            header ("Location:./");
            exit();
        }
    }
}