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


     public function deleteAction(): void
    {
        $modelTask = new ModelTask();
        $taskId = ((int) $this->_getParam('id'));
        
        //$id = (int)$_GET['id'];

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) { //verifica si se ha enviado la solicitud
            $modelTask->delete($taskId); //elimina la task;
            header ("Location:./");
            exit();
        }
    }
}