<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validator;
use App\User;

class LoginController extends Controller
{
    public function index(){
    	return view('login.form');
    }
}
