<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
            
            mkdir('files/'.$data['name']);
            mkdir('files/'.$data['name'].'/doc');
            mkdir('files/'.$data['name'].'/pic');
            mkdir('files/'.$data['name'].'/tmp');
            require 'connect.php';
            
                $sql_userPhotoTable = "CREATE TABLE ".$data['name']."_slike (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                        naslov VARCHAR(255),
                        path VARCHAR(255),
                        path_thumb VARCHAR(255)
                        )";
            
            $stmt = $conn->query($sql_userPhotoTable);

		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

}
