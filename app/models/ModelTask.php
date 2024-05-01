<?php 

// declarar class.
class ModelTask extends Model
{
// declarar variables.
    protected $dbJson;
    protected array $tasks;
    protected int $id;

// declarar el construct.
    public function __contruct() 
    {
        $this->dbJson = __DIR__ . "/db.json";
        $this->tasks = [];
        $this->id = $this->newID();
    }

   

// declarar un array que converta los datos json en php.
    public function allTask() : array
    {   
        $dataBase = file_get_contents($this->dbJson);

        $this->tasks = json_decode($dataBase, true);
        return $this->tasks;
    
        
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
        
        $this->allTask();
        $this->tasks[] = $newTask;
        $var1 = json_encode($this->tasks, JSON_PRETTY_PRINT);
        file_put_contents($this->dbJson, $var1);
    }

// declarar method ver task.
// declarar method editar task.
// declarar method eliminar task.
}
?>