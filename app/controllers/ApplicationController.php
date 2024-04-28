<?php

/**
 * Base controller for the application.
 * Add general things in this controller.
 */
class ApplicationController extends Controller 
{
	private $modelTask;

    public function __construct(){

        $this->modelTask = new ModelTask();
    }

    public function readTask(){
        $task = new ModelTask();
        $id = $_GET["id"]; 
        $oneTask = $task -> readTask($id);
        $this -> view -> oneTask = $oneTask;
    }
}
