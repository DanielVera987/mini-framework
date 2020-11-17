<?php 

namespace App\Http\User\Application;

use App\Models\User;
use App\Service\UserService;

class NewUser
{
  private $name = '';
  private $email = '';
  private $password = '';
  private $salt = '';

  public function __construct($name = '',
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

  public function __invoke()
  {
    $user = new User; 
    $user->email = $this->name;
    $user->password = $this->password;
    
    $userService = new UserService;
    return $userService->login($user);
  }
}