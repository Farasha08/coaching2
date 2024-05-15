<?php

/**
 * home controller
 */
class Users extends Controller
{
	
	function index()
	{
		// code...
		//$user = $this->load_model('User');
		if (!Auth::logged_in()) 
		{
			$this->redirect('login');
			# code...
		}
		$user =  new User();
		
		//$user->insert($arr);
		//$user->update(3, $arr);
		//$user->delete(3);

		//$data = $user->findAll();
		$data = $user->query("select * from users where position != 'student' order by id desc");

		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['staff','users'];

		$this->view('users',[
			'rows'=>$data,
			'crumbs'=>$crumbs,
		]);
	}
}