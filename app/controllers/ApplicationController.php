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

    public function indexAction(){
        $task = new ModelTask;
        $data = $task -> allTask();
        var_dump($data);
        $this -> view -> data = $data;
    }
}
