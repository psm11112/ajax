<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function index()
    {


       return view('register');

    }
    public function add(Request $request){

        $firstName=$request->input('first_name');
        $lastName=$request->input('last_name');
        $email=$request->input('email');
        $gender=$request->input('gender');
        $phone=$request->input('phone');
        $password=$request->input('password');
        $userModel=new UserModel();
        $userModel->first_name=$firstName;
        $userModel->last_name=$lastName;
        $userModel->email=$email;
        $userModel->gender=$gender;
        $userModel->phone=$phone;
        $userModel->password=Hash::make($password);
        $userModel->save();
    }
    public  function getAll(){

        $userMode=new UserModel();
        $user=$userMode->getAll()->toArray();

        return json_encode($user);


    }
}
