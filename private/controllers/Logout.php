<?php

/**
 * home controller
 */
class Logout extends Controller
{
	
	function index()
	{
		// code...
		//$user = $this->load_model('User');
		Auth::logout();
		$this->redirect('login');
			
	}
}