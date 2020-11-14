<?php

namespace App\Service;
use App\Database\Database as DB,
    App\Models\User,
    PDO,
    PDOException;

class UserService 
{
  private $_db;

  public function __construct()
  {
    $this->_db = DB::connec();
  }

  public function login(User $user)
  {
    try {
      $sql = $this->_db->prepare('SELECT * FROM user WHERE nombre = :email');
      $sql->execute([
        "email" => $user->email
      ]);
      $result = $sql->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\User');
      
      $pwd = $result['0']->password;
      $hash = $pwd . $result['0']->salt;
  
      if (password_verify($user->password, $hash)) {
        return $result;
      }else{
        throw new \Exception("Contraseña invalida");
      }
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function register(User $user)
  {
    try {
      $sql = $this->_db->prepare('INSERT INTO user (nombre, email, password, salt, created_at) VALUE (:nombre, :email, :password, :salt, :created_at)');

      $encrypt = random_bytes(8);
      $salt = base64_encode($encrypt);
      $pwd = password_hash($user->password . $salt, PASSWORD_DEFAULT);

      $sql->execute([
        "nombre" => $user->nombre,
        "email" => $user->email,
        "password" => $pwd,
        "salt" => $salt,
        "created_at" => date('Y-m-d')
      ]);

      $id = $this->_db->lastInsertId();

      return $id;
    } catch (\Throwable $th) {
      //throw $th;
    }
  }
}