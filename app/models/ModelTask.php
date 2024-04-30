<?php 

// declarar class.
class ModelTask extends Model
{
// declarar variables.
    protected $dbJson;

// declarar el construct.
    function __contruct() 
    {
        $this->dbJson = __DIR__ . "/db.json";
    }

// declarar un array que converta los datos json en php.
    function allTask() : array
    {
        $data = [];
        $json = json_decode(file_get_contents($this->dbJson)); //convierte los datos json en php.
        foreach ($json as $row) {  //convierte todos los datos a una array asociativa. 
            $data[$row->id] = $row;
        }
        return $data;
    }
// declarar method incremente el id.. (o lo podem incrementar al crear la task, o incrementar x un metodo).
// declarar method crear task.
// declarar method ver task.
// declarar method editar task.
    function updateTask(int $id, array $updateTask) : void
    {
        $allList = $this->allTask();            //crease la lista de tareas
        foreach($allList as $i => $task) {      //recorre la lista generando un index por tarea
            if($id === $task["id"]) {           //comproba si el id informado está en la lista
                $allList[$i] = $updateTask;     //actualiza la actualizacion de updateTask en la posicion del inde ne la lista
            }
        }

        $tasks = array_values($allList); //Reorganiza los elementos del array
        $jsonFile = json_encode($tasks, JSON_PRETTY_PRINT); //decodifica el archivo php a json
        file_put_contents(ROOT_PATH . '/app/models/db.json' , $jsonFile); //guarda los cambios en la bd.
    }
    
// declarar method eliminar task.
}
?>