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
public function delete(int $id): void
    {
        $allList = $this->allTask();

        
        unset($allList[$id]); //se elimina la task utilizando el unset.
            
        

        $tasks = array_values($allList); //Reorganiza los elementos del array
        $jsonFile = json_encode($tasks, JSON_PRETTY_PRINT); //decodifica el archivo php a json
        file_put_contents(ROOT_PATH . '/app/models/db.json' , $jsonFile); //guarda los cambios en la bd.
    }
}
?>