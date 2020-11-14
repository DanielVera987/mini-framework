<?php 

namespace App\Http\Controllers;

use App\Models\User,
    App\Database\Database,    
    App\Helpers\Validator,
    App\Service\UserService;

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
    $user = Validator::isEmail($_POST['email']);
    $pass = Validator::isPassword($_POST['password']);

    if (!$user && !$pass) {
      //Error
    }

    $user = new User; 
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    
    $userService = new UserService;
    $result = $userService->login($user);

  }

  public function postRegister()
  {
    $nombre = (!Validator::isEmpty($_POST['nombre'])) ? $_POST['nombre'] : false;
    $email = (!Validator::isEmpty($_POST['email']) && Validator::isEmail($_POST['email']))
                ? $_POST['email']
                : false;
    $password = (!Validator::isEmpty($_POST['password']) && Validator::isPassword($_POST['password']))
                ? $_POST['password']
                : false;
    
    if(!$nombre && !$email && !$password) {
      $type= 'warning';
      $msg = 'Error al registrarse';
    }

    $user = new User;
    $user->nombre = $nombre;
    $user->email = $email;
    $user->password = $password;

    $userService = new UserService;
    $result = $userService->register($user);

    if(!is_numeric($result)) {
      $type= 'warning';
      $msg = 'Error al registrarse';
    }else{
      $type= 'success';
      $msg = 'Registro exitoso';
    }
    
    return view('auth/register');
  }
}