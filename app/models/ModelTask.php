
<?php 

class ModelTask
{
    protected array $tasks;
    protected $dbJson;

    function __contruct() 
    {
        $this->tasks = [];
    }

// declarar un array que converta los datos json en php.

    public function allTask(): array
    {   
        $dbJson = file_get_contents(ROOT_PATH . '/app/models/db.json');
        $this->tasks = json_decode($dbJson, true);
        
        foreach($this->tasks as $task) {
            $this->tasks[$task['id']] = $task;
        }
        return $this->tasks;
    }

    public function newId(): int
    {
        $allTask = $this->allTask();

        $lastInfo = end($allTask); //coger el ultimo registro del array.
        $nextId = $lastInfo['id'];
        $nextId++;
        return $nextId;
    }

    public function create(array $newTask): void //puedes recibir las info o implementarlas desde de el method.
    {
        $allTask = $this->allTask();

        $lastTask = end($allTask);
        $newTask['id'] = $lastTask['id'] + 1;
        $this->tasks[] = $newTask;
        $var1 = json_encode($this->tasks, JSON_PRETTY_PRINT);
        file_put_contents(ROOT_PATH . '/app/models/db.json', $var1);
    }

    public function read(int $id)//confirmar el return, array?
    {
        $allTask = $this->allTask();

        return $allTask[$id];
    }

    function updateTask( array $updatedTask)
    {
        $data = $this -> allTask();
        foreach ($data as $i => $task) {
            //var_dump($task); echo '</br>';
            if ($task -> id == $updatedTask[0]['id']) {
                $data[$i] =  $updatedTask[0];
            }
        }
        $json = json_encode(array_values($data), JSON_PRETTY_PRINT);
        file_put_contents(ROOT_PATH . '/app/models/data.json', $json);
    }

    public function delete(int $id): void
    {
        $allList = $this->allTask();

        foreach ($allList as $index => $task) {
            if ($id === $task["id"]) {
                unset($allList[$index]); //se elimina la task utilizando el unset.
            }
        }

        $tasks = array_values($allList); //Reorganiza los elementos del array
        $jsonFile = json_encode($tasks, JSON_PRETTY_PRINT); //decodifica el archivo php a json
        file_put_contents(ROOT_PATH . '/app/models/db.json' , $jsonFile); //guarda los cambios en la bd.
    }
}
?>
