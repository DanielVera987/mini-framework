<?php

namespace App\Helpers;

class Validator 
{

  public static function isPassword(string $pwd) : bool
  {
    $pass = preg_match('/^[0-9a-zA-Z]{6,9}$/', $pwd);
    return (bool) $pass;
  }

  public static function isEmail(string $email) : bool
  {
    $mail = filter_var($email, FILTER_VALIDATE_EMAIL);
    return (bool) $mail;
  }

  public static function isEmpty(string $str) : bool
  {
    $str = empty(trim($str));
    return (bool) $str;
  }

  public static function isString($str) : bool
  {
    $str = is_string($str);
    return (bool) $str;
  }

  public static function isNumber($num) : bool
  {
    $num = is_numeric($num);
    return (bool) $num;
  }

  public static function isURL($url) : bool
  {
    $url = filter_var($url, FILTER_VALIDATE_URL);
    return (bool) $url;
  }
}