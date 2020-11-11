<?php 

namespace App\Http\Controllers;

class AuthController
{
  public function index()
  {
    return view('auth/login');
  }

  public function register()
  {
    return view('auth/register');
  }

  public function login()
  {

  }

  public function postRegister()
  {

  }
}