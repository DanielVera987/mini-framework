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

    if (!$user || !$pass) {
      $_SESSION['type'] = 'warning';
      $_SESSION['msg'] = 'contraseña o email incorrectos';
      return header("Location: " . __URL__ . "auth");
    }

    $user = new User; 
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    
    $userService = new UserService;
    $result = $userService->login($user);

    if(!$result){
      $_SESSION['type'] = 'warning';
      $_SESSION['msg'] = 'No existe el usuario';
    }else{
      $_SESSION['user'] = (array) $result['0'];
      return header("Location: " . __URL__);
    }

    return header("Location: " . __URL__ . "auth");
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
    
    if(!$nombre || !$email || !$password) {
      $_SESSION['type'] = 'warning';
      $_SESSION['msg'] = 'Error al registrarse';
      return header("Location: " . __URL__ . "auth/register");
    }

    $user = new User;
    $user->nombre = $nombre;
    $user->email = $email;
    $user->password = $password;

    $userService = new UserService;
    $result = $userService->register($user);

    if(!is_numeric($result)) {
      $_SESSION['type'] = 'warning';
      $_SESSION['msg'] = 'Error al registrarse';
    }else{
      $_SESSION['type'] = 'success';
      $_SESSION['msg'] = 'Registro exitoso';
    }

    if($result == 1){
      $_SESSION['type'] = 'info';
      $_SESSION['msg'] = 'El usario ya existe';
    }
    
    return header("Location: " . __URL__ . "auth/register");
  }

  public function exit()
  {
    unset($_SESSION['user']);
    header("Location: " . __URL__);
  }
}
