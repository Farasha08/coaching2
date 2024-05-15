<?php

/**
 * single course controller
 */
class Single_course extends Controller
{
	
	public function index($id = '')
	{
		// code...

		$errors = array();
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$courses = new Courses_model();
		$row = $courses->first('course_id',$id);

		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['courses','courses'];

		if($row){
			$crumbs[] = [$row->course,''];
		}

		$page_tab = isset($_GET['tab']) ? $_GET['tab'] : 'lecturers';
		$lect = new Lecturers_model();

		$results = false;

		if($page_tab == 'lecturers'){
			
			//display lecturers
			$query = "select * from course_lecturers where course_id = :course_id && disabled = 0 order by id desc";
			$lecturers = $lect->query($query,['course_id'=>$id]);

			$data['lecturers'] 		= $lecturers;
		}else
		if($page_tab == 'students'){
			
			//display lecturers
			$query = "select * from course_students where course_id = :course_id && disabled = 0 order by id desc";
			$students = $lect->query($query,['course_id'=>$id]);

			$data['students'] 		= $students;
		}

		$data['row'] 		= $row;
 		$data['crumbs'] 	= $crumbs;
		$data['page_tab'] 	= $page_tab;
		$data['results'] 	= $results;
		$data['errors'] 	= $errors;

		$this->view('single-course',$data);
	}

	public function lectureradd($id = '')
	{

		$errors = array();
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$courses = new Courses_model();
		$row = $courses->first('course_id',$id);

		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['courses','courses'];

		if($row){
			$crumbs[] = [$row->course,''];
		}

		$page_tab = 'lecturer-add';
		$lect = new Lecturers_model();

		$results = false;
		
		if(count($_POST) > 0)
		{

			if(isset($_POST['search'])){

				if(trim($_POST['name']) != ""){

					//find lecturer
					$user = new User();
					$name = "%".trim($_POST['name'])."%";
					$query = "select * from users where (firstname like :fname || lastname like :lname) && position = 'lecturer' limit 10";
					$results = $user->query($query,['fname'=>$name,'lname'=>$name,]);
				}else{
					$errors[] = "please type a name to find";
				}
			
			}else
			if(isset($_POST['selected'])){

				//add lecturer
				$query = "select id from course_lecturers where user_id = :user_id && course_id = :course_id && disabled = 0 limit 1";
  
				if(!$lect->query($query,[
					'user_id' => $_POST['selected'],
					'course_id' => $id,
				])){

					$arr = array();
	 				$arr['user_id'] 	= $_POST['selected'];
	 				$arr['course_id'] 	= $id;
					$arr['disabled'] 	= 0;
					$arr['date'] 		= date("Y-m-d H:i:s");

					$lect->insert($arr);

					$this->redirect('single_course/'.$id.'?tab=lecturers');

				}else{
					$errors[] = "that lecturer already belongs to this course";
				}
 
			}

		}

		$data['row'] 		= $row;
 		$data['crumbs'] 	= $crumbs;
		$data['page_tab'] 	= $page_tab;
		$data['results'] 	= $results;
		$data['errors'] 	= $errors;

		$this->view('single-course',$data);
	}


	public function lecturerremove($id = '')
	{

		$errors = array();
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$courses = new Courses_model();
		$row = $courses->first('course_id',$id);


		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['courses','courses'];

		if($row){
			$crumbs[] = [$row->course,''];
		}

		$page_tab = 'lecturer-remove';
		$lect = new Lecturers_model();

		$results = false;
		
		if(count($_POST) > 0)
		{

			if(isset($_POST['search'])){

				if(trim($_POST['name']) != ""){

					//find lecturer
					$user = new User();
					$name = "%".trim($_POST['name'])."%";
					$query = "select * from users where (firstname like :fname || lastname like :lname) && position = 'lecturer' limit 10";
					$results = $user->query($query,['fname'=>$name,'lname'=>$name,]);
				}else{
					$errors[] = "please type a name to find";
				}
			
			}else
			if(isset($_POST['selected'])){

				//add lecturer
				$query = "select id from course_lecturers where user_id = :user_id && course_id = :course_id && disabled = 0 limit 1";
 
				if($row = $lect->query($query,[
					'user_id' => $_POST['selected'],
					'course_id' => $id,
				])){

					$arr = array();
						$arr['disabled'] 	= 1;

					$lect->update($row[0]->id,$arr);

					$this->redirect('single_course/'.$id.'?tab=lecturers');

				}else{
					$errors[] = "that lecturer was not found in this course";
				}
 
			}

		}

		$data['row'] 		= $row;
 		$data['crumbs'] 	= $crumbs;
		$data['page_tab'] 	= $page_tab;
		$data['results'] 	= $results;
		$data['errors'] 	= $errors;

		$this->view('single-course',$data);
	}


	public function studentadd($id = '')
	{

		$errors = array();
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$courses = new Courses_model();
		$row = $courses->first('course_id',$id);

		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['courses','courses'];

		if($row){
			$crumbs[] = [$row->course,''];
		}

		$page_tab = 'student-add';
		$stud = new Students_model();

		$results = false;
		
		if(count($_POST) > 0)
		{

			if(isset($_POST['search'])){

				if(trim($_POST['name']) != ""){

					//find student
					$user = new User();
					$name = "%".trim($_POST['name'])."%";
					$query = "select * from users where (firstname like :fname || lastname like :lname) && position = 'student' limit 10";
					$results = $user->query($query,['fname'=>$name,'lname'=>$name,]);
				}else{
					$errors[] = "please type a name to find";
				}
			
			}else
			if(isset($_POST['selected'])){

				//add student
				$query = "select id from course_students where user_id = :user_id && course_id = :course_id && disabled = 0 limit 1";
  
				if(!$stud->query($query,[
					'user_id' => $_POST['selected'],
					'course_id' => $id,
				])){

					$arr = array();
	 				$arr['user_id'] 	= $_POST['selected'];
	 				$arr['course_id'] 	= $id;
					$arr['disabled'] 	= 0;
					$arr['date'] 		= date("Y-m-d H:i:s");

					$stud->insert($arr);

					$this->redirect('single_course/'.$id.'?tab=students');

				}else{
					$errors[] = "that student already belongs to this course";
				}
 
			}

		}

		$data['row'] 		= $row;
 		$data['crumbs'] 	= $crumbs;
		$data['page_tab'] 	= $page_tab;
		$data['results'] 	= $results;
		$data['errors'] 	= $errors;

		$this->view('single-course',$data);
	}


	public function studentremove($id = '')
	{

		$errors = array();
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$courses = new Courses_model();
		$row = $courses->first('course_id',$id);


		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['courses','courses'];

		if($row){
			$crumbs[] = [$row->course,''];
		}

		$page_tab = 'student-remove';
		$stud = new Students_model();

		$results = false;
		
		if(count($_POST) > 0)
		{

			if(isset($_POST['search'])){

				if(trim($_POST['name']) != ""){

					//find student
					$user = new User();
					$name = "%".trim($_POST['name'])."%";
					$query = "select * from users where (firstname like :fname || lastname like :lname) && position = 'student' limit 10";
					$results = $user->query($query,['fname'=>$name,'lname'=>$name,]);
				}else{
					$errors[] = "please type a name to find";
				}
			
			}else
			if(isset($_POST['selected'])){

				//add student
				$query = "select id from course_students where user_id = :user_id && course_id = :course_id && disabled = 0 limit 1";
 
				if($row = $stud->query($query,[
					'user_id' => $_POST['selected'],
					'course_id' => $id,
				])){

					$arr = array();
						$arr['disabled'] 	= 1;

					$stud->update($row[0]->id,$arr);

					$this->redirect('single_course/'.$id.'?tab=students');

				}else{
					$errors[] = "that student was not found in this course";
				}
 
			}

		}

		$data['row'] 		= $row;
 		$data['crumbs'] 	= $crumbs;
		$data['page_tab'] 	= $page_tab;
		$data['results'] 	= $results;
		$data['errors'] 	= $errors;

		$this->view('single-course',$data);
	}


	
}