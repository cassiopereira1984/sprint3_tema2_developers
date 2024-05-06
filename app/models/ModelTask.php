<?php 

// declarar class.
class ModelTask
{
// declarar variables.
    protected $dbJson;
    protected array $tasks;
    protected int $id;

// declarar el construct.
    public function __construct() 
    {
       
    }

// declarar un array que converta los datos json en php.
    public function allTask() : array
    {   
        $fileName = __DIR__ . "/db.json";
        $data = file_get_contents($fileName);        
        $tasks = json_decode($data, true);
        return $tasks;
    
        
    }
    public function newID(): int
    {
        $this->allTask();
        $lastTask = end($this->tasks);   //coger ultimo objeto que hay en el array
        $newID = ($lastTask == null) ? 1 : ++$lastTask["id"];     // incrementar numero id
        return $newID;
    }

// declarar method eliminar task.
public function deleteTask($taskId) {
    // Obtener el contenido del archivo JSON
    $fileName = __DIR__ . "/db.json";
    $json = file_get_contents($fileName);

    // Decodificar el JSON en un array asociativo
    $tasks = json_decode($json, true);

    // Buscar la tarea por su ID y eliminarla del array
    foreach ($tasks as $key => $task) {
        if ($task['id'] == $taskId) {
            unset($tasks[$key]);
            break; // Salir del bucle una vez que se elimine la tarea
        }
    }

    // Codificar el array nuevamente a JSON
    $json = json_encode($tasks, JSON_PRETTY_PRINT);

    // Escribir el JSON de vuelta al archivo
    file_put_contents($fileName, $json);
}
}
?>