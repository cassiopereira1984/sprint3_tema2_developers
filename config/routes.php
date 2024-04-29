<?php 

/**
 * Used to define the routes in the system.
 * 
 * A route should be defined with a key matching the URL and an
 * controller#action-to-call method. E.g.:
 * 
 * '/' => 'index#index',
 * '/calendar' => 'calendar#index'
 */
$routes = array(
	//chequear rutas seguin las vistas implementadas
	'/create' => 'Application#createTask',
	'/read' => 'Application#readTask',
	'/update' => 'Application#updateTask',
	'/delete' => 'Application#deleteTask'
);
