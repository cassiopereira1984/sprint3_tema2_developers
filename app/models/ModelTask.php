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
// declarar method incremente el id.. (o lo podem incrementar al crear la task, o incrementar x un metodo).
// declarar method crear task.
// declarar method ver task.
// declarar method editar task.
// declarar method eliminar task.
}
?>