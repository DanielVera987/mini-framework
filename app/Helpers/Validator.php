<?php

namespace App\Helpers;

class Validator 
{

  public static function isPassword(string $pwd, int $min = 6, int $max = 9) : bool
  {
    $pass = preg_match('/^[0-9]{$min-$max}$/', $pwd);
    return $pass;
  }
}