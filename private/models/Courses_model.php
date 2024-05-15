<?php

/**
 * Classes Model
 */
class Courses_model extends Model
{
    protected $table = 'courses';

    protected $allowedColumns = [
        'course',
        'date',
    ];

    protected $beforeInsert = [
        'make_course_id',
        'make_user_id',
    ];

    protected $afterSelect = [
        'get_user',
    ];


    public function validate($DATA)
    {
        $this->errors = array();

        //check for course name
        if(empty($DATA['course']) || !preg_match('/^[a-z A-Z0-9]+$/', $DATA['course']))
        {
            $this->errors['course'] = "Only letters & numbers allowed in course name";
        }
 
        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }


    public function make_user_id($data)
    {
        if(isset($_SESSION['USER']->user_id)){
            $data['user_id'] = $_SESSION['USER']->user_id;
        }
        return $data;
    }

    public function make_course_id($data)
    {
        
        $data['course_id'] = random_string(60);
        return $data;
    }

    public function get_user($data)
    {
        
        $user = new User();
        foreach ($data as $key => $row) {
            // code...
            $result = $user->where('user_id',$row->user_id);
            $data[$key]->user = is_array($result) ? $result[0] : false;
        }
       
        return $data;
    }

    

 
}