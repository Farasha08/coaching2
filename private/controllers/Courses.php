<?php


/**
 * classes controller
 */
class Courses extends Controller
{
	
	public function index()
	{
		// code...
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$courses = new Courses_model();

		$data = $courses->findAll();

		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Courses','courses'];

		$this->view('courses',[
			'crumbs'=>$crumbs,
			'rows'=>$data
		]);
	}

	public function add()
	{
		// code...
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$errors = array();
		if(count($_POST) > 0)
 		{

			$courses = new Courses_model();
			if($courses->validate($_POST))
 			{
 				
 				$_POST['date'] = date("Y-m-d H:i:s");

 				$courses->insert($_POST);
 				$this->redirect('courses');
 			}else
 			{
 				//errors
 				$errors = $courses->errors;
 			}
 		}

 		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Courses','courses'];
		$crumbs[] = ['Add','courses/add'];

		$this->view('courses.add',[
			'errors'=>$errors,
			'crumbs'=>$crumbs,
			
		]);
	}

	public function edit($id = null)
	{
		// code...
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$courses = new Courses_model();

		$errors = array();
		if(count($_POST) > 0)
 		{

			if($courses->validate($_POST))
 			{
 				
 				$courses->update($id,$_POST);
 				$this->redirect('courses');
 			}else
 			{
 				//errors
 				$errors = $courses->errors;
 			}
 		}

 		$row = $courses->where('id',$id);

 		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Courses','courses'];
		$crumbs[] = ['Edit','courses/edit'];

		$this->view('courses.edit',[
			'row'=>$row,
			'errors'=>$errors,
			'crumbs'=>$crumbs,
		]);
	}

	public function delete($id = null)
	{
		// code...
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$courses = new Courses_model();

		$errors = array();

		if(count($_POST) > 0)
 		{
 
 			$courses->delete($id);
 			$this->redirect('courses');
 		 
 		}

 		$row = $courses->where('id',$id);

 		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Courses','courses'];
		$crumbs[] = ['Delete','courses/delete'];

		$this->view('courses.delete',[
			'row'=>$row,
 			'crumbs'=>$crumbs,
		]);
	}
	
}