<?php

namespace App\Http\User\Application;

use App\Helpers\Validator;

class UserValidate
{
  private $name = '';
  private $email = '';
  private $password = '';
  private $salt = '';

  public function __construct(
    $name = '',
    $email = '',
    $password = '',
    $salt = ''
  )
  {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $this->salt = $salt;
  }

  public function login()
  {
    $user = Validator::isEmail($email);
    $pass = Validator::isPassword($password);

    if (!$user || !$pass) {
      $_SESSION['type'] = 'warning';
      $_SESSION['msg'] = 'contraseña o email incorrectos';
      return header("Location: " . __URL__ . "auth");
    }
  }
}