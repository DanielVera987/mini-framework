<?php

namespace App\Database;

use PDO;
use PDOException;

class Database
{
  private static $_db = '';

  public static function connec()
  {
    try {
      if (!self::$_db) 
      {
        $conn = new PDO(
          __DB__['HOST'],
          __DB__['USER'],
          __DB__['PASSWORD'],
        );
  
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  
        self::$_db = $conn;
      }

      return self::$_db;
    } catch (PDOException $th) {
      return 'Fallo' . $th->getMessage();
    }
  }
}