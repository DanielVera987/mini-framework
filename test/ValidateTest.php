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

  public function test_string()
  {
    $str = Validator::isString('test');
    $this->assertTrue($str);

    $str = Validator::isString(12);
    $this->assertFalse($str);
  }

  public function test_number()
  {
    $num = Validator::isNumber(12);
    $this->assertTrue($num);

    $num = Validator::isNumber('test');
    $this->assertFalse($num);
  }

  public function test_URL()
  {
    $url = Validator::isURL('http://example.com');
    $this->assertTrue($url);

    $url = Validator::isURL('test');
    $this->assertFalse($url);
  }
}