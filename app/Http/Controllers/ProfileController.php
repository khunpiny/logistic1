<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ProfileController extends Controller
{
    public function postprofile(array $data){
    	 return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => $data['status'],
            'tel' => $data['tel'],
            'sex' => $data['sex']
        ]);
    }
}
