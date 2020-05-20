<?php

/**
 * 
 */
class Controller_close_session
{
	public function cerrar_session(){
		session_start(); 
		session_unset();
		session_destroy();
		header("Location: ?controller=login&action=view");
	}
}

