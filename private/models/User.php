<?php

/**
 * User Model
 */
class User extends Model
{
	//protected $table = "users";
	protected $allowedColumns = [
        'firstname',
        'lastname',
        'email',
        'password',
        'gender',
        'position',
        'date',
    ];

	protected $beforeInsert = [
        'make_user_id',
        'hash_password'
    ];

	public function validate($DATA)
	{
		$this->errors = array();

		if (empty($DATA['firstname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['firstname'])) {
			$this->errors['firstname'] = "firstname can only consist letters";
		}

		if (empty($DATA['lastname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['lastname'])) {
			$this->errors['lastname'] = "Lastname can only consist letters";
		}

		if (empty($DATA['email']) || !filter_var($DATA['email'], FILTER_VALIDATE_EMAIL) ) {
			$this->errors['email'] = "The email is invalid";
		}

		if($this->where('email',$DATA['email']))
        {
            $this->errors['email'] = "That email is already in use";
        }

		$genders = ['male', 'female'];

		if (empty($DATA['gender']) || !in_array($DATA['gender'], $genders)) {
			$this->errors['gender'] = "Invalid gender";
		}

		$positions = ['student', 'lecturer', 'admin'];

		if (empty($DATA['position']) || !in_array($DATA['position'], $positions)) {
			$this->errors['position'] = "Invalid position";
		}

		if(empty($DATA['password']) || $DATA['password'] !== $DATA['password2'])
        {
            $this->errors['password'] = "Passwords do not match";
        }

        //check for password length
        if(strlen($DATA['password']) < 8)
        {
            $this->errors['password'] = "Password must be at least 8 characters long";
        }

		if(count($this->errors) == 0){
			return true;
		}
		return false;
	}
	 public function make_user_id($data)
    {
         $data['user_id'] = strtolower($data['firstname'] . "." . $data['lastname']);

        while($this->where('user_id',$data['user_id']))
        {
            $data['user_id'] .= rand(10,9999);
        }

        return $data;
    }
    public function hash_password($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $data;
    }

   

	
}