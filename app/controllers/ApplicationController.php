<?php

/**
 * Base controller for the application.
 * Add general things in this controller.
 */
class ApplicationController extends Controller 
{
        
    public function indexAction(){
        $modelTask = new ModelTask;
        $task = $modelTask->allTask();
        $this->view->task = $task;
    }

    public function createAction()
    {
        $modelTask = new ModelTask();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

            $modelTask->create($newTask);
            header("Location: /"); 
            exit();
        }
 
    }

    public function readAction()
    {
        $modelTask = new ModelTask();

        $id = $_GET["id"]; 
        $task = $modelTask->read($id);
        $this->view->task = $task;
    }

    public function updateAction() 
    {
        $task = new ModelTask;
        $id = $_GET["id"]; 
        $editTask =  $task -> allTask();
        $this -> view -> editTask = $editTask;

        if (!empty($_POST)) {
            $newData [] = [
                'id' => $id,
                'nom' => $_POST["nom"],
                'estat' => $_POST["estat"],
                'hora_ini' => $_POST["hora_ini"],
                'hora_fi' => $_POST["hora_fi"],
                'autor' => $_POST["autor"]];
        $task -> updateTask($newData); 
        return header("Location:./");
            }
    }

    public function deleteAction(): void
    {
        $modelTask = new ModelTask();
        $id = (int)$_GET['id'];

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) { //verifica si se ha enviado la solicitud
            $modelTask->delete($id); //elimina la task;
            header ("Location:./");
            exit();
        }
    }
}