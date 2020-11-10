<?php

use PHPUnit\Framework\TestCase;
use App\Helpers\Validator;

class ValidateTest extends TestCase 
{
  public function test_password()
  {
    $pwd = Validator::isPassword('1234a6');
    $this->assertTrue($pwd);

    $pwd = Validator::isPassword('1234567890');
    $this->assertFalse($pwd);
  }

  public function test_email()
  {
    $email = Validator::isEmail('daniel@gmail.com');
    $this->assertTrue($email);

    $email = Validator::isEmail('daniel@gmailcom');
    $this->assertFalse($email);
  }

  public function test_empty()
  {
    $str = Validator::isEmpty('');
    $this->assertTrue($str);

    $str = Validator::isEmpty('     ');
    $this->assertTrue($str);

    $str = Validator::isEmpty('test');
    $this->assertFalse($str); 
  }

  //isString

  //isNumber

  //isFloat

  //isUrl

  //isIP

  //isMAC
}