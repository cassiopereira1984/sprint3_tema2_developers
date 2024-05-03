<?php 

// declarar class.
class ModelTask
{
// declarar variables.
    protected $dbJson;
    protected array $tasks;
    protected int $id;

// declarar el construct.
    public function __contruct() 
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
// declarar method incremente el id.. (o lo podem incrementar al crear la task, o incrementar x un metodo).
// declarar method crear task.
    public function createTask(array $newTask) //puedes recibir las info o implementarlas desde de el method.
    {
        
        // Obtener el contenido actual del archivo JSON
        $jsonData = file_get_contents(ROOT_PATH . '/app/models/db.json');

        // Decodificar el contenido JSON en un array asociativo
        $data = json_decode($jsonData, true);

        // Obtener el ID para la nueva tarea
        $lastTask = end($data);
        $newTask['id'] = $lastTask['id'] + 1;

        // Agregar la nueva tarea al array de datos
        $data[] = $newTask;

        // Codificar el array de datos en formato JSON
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);

        // Escribir el contenido JSON de vuelta al archivo
        file_put_contents(ROOT_PATH . '/app/models/db.json', $jsonData);
    }

// declarar method ver task.
// declarar method editar task.
// declarar method eliminar task.
}
?>