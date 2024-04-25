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
// declarar method eliminar task.
}
?>