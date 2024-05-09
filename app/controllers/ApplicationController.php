<?php
class ApplicationController extends Controller
{

    private $modelTask;

    public function __construct(){

        $this->modelTask = new ModelTask();
    }

    public function indexAction(){
        $allTasks = $this->modelTask->allTask();
        $this->view->allTasks = $allTasks;  
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

            // Crear un array con los datos de la nueva tarea
            $newTask = [
                'description' => $description,
                'status' => $status,
                'date_ini' => $date_ini,
                'date_end' => $date_end,
                'user' => $user
            ];
            $modelTask->create($newTask);
            header("Location: ./");
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
        $modelTask = new ModelTask;

        $id = $_GET['id'];
        $task = $modelTask->read($id);
        $this->view->task = $task;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updateTask = [
                'id' => $id,
                'description' => $_POST['description'],
                'status' => $_POST['status'],
                'date_ini' => $_POST['date_ini'],
                'date_end' => $_POST['date_end'],
                'user' => $_POST['user']
            ];
            $modelTask->update($updateTask);
            header('Location: ./'); // Redirigir a la página principal
            exit();
        }
    }

    public function deleteAction(){
        $task = new ModelTask;
        $id = $_GET["id"];
      
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) {
            $task-> delete($id);
            header ("Location:./");
        }
       
        
        
    }
}