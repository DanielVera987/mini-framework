<?php

use PHPUnit\Framework\TestCase;
use App\Helpers\Validator;

class ValidateTest extends TestCase 
{
  public function test_password()
  {
    $pwd = Validator::isPassword('123456');
    $this->assertTrue($pwd);
  }
}