<?php 

class ModelTask
{
    protected array $tasks;

    function __construct() 
    {
        $this->tasks = [];
    }

// declarar un array que converta los datos json en php.

    public function allTask(): array
    {   
        $allTask = [];
        $dbJson = file_get_contents(ROOT_PATH . '/app/models/db.json');
        $tasks = (array)json_decode($dbJson, true);
        
        foreach($tasks as $task) {
            $allTask[$task['id']] = $task;
        }
        return $allTask;
    }

    public function newId(): int
    {
        $allTask = $this->allTask();

        $lastInfo = end($allTask); //coger el ultimo registro del array.
        $nextId = $lastInfo['id'];
        $nextId++;
        return $nextId;
    }

    public function create(array $newTask) //puedes recibir las info o implementarlas desde de el method.
    {
        $allTask = $this->allTask();

        $newTask['id'] = $this->newId();
        $allTask[] = $newTask;
        $var1 = json_encode($allTask, JSON_PRETTY_PRINT);
        file_put_contents(ROOT_PATH . '/app/models/db.json', $var1);
    }

    public function read(int $id)//confirmar el return, array?
    {
        $allTask = $this->allTask();

        return $allTask[$id];
    }

    function update(array $updateTask): void
    {
        $allTask = $this->allTask();

        foreach($allTask as $i => $task) {
            if((int)$task['id'] === (int)$updateTask['id']) {
                $allTask[$i] = $updateTask;
            }
        }
        
        $jsonFile = json_encode(array_values($allTask), JSON_PRETTY_PRINT);
        file_put_contents(ROOT_PATH . '/app/models/db.json', $jsonFile);
    }


    public function delete($id){
        $data = $this->allTask();
        unset($data[$id]);
  
        $json = json_encode(array_values($data), JSON_PRETTY_PRINT);
        file_put_contents(ROOT_PATH . '/app/models/db.json', $json);
    }
}
?>