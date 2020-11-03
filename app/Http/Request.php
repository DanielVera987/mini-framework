<?php

namespace App\Http;

use Exception;

class Request 
{
  protected $arguments = [];
  protected $controller = '' ;
  protected $method = '';

  public function __construct()
  {
    $this->arguments = explode('/', $_SERVER['REQUEST_URI']);
    
    $this->setController();
    $this->setMethod();
  }

  private function setController()
  {
    $this->controller = empty($this->arguments[1])
        ? 'home'
        : $this->arguments[1];
  }

  private function setMethod()
  {
    $this->method = empty($this->arguments[2])
        ? 'index'
        : $this->arguments[2];
  }

  private function getController()
  {
    $controller = ucfirst($this->controller);

    return "App\\Http\\Controllers\\{$controller}Controller";
  }

  private function getMethod()
  {
    return $this->method;
  }

  public function send()
  {
    $controller = $this->getController();
    $method = $this->getMethod();

    $response = call_user_func([
      new $controller,
      $method
    ]);

    try
    {
      if ($response instanceof Response)
      {
        $response->send();
      } else {
        throw new \Exception('Error processing Request', 1);
      }
    } catch(\Exception $e) {
      echo "Details {$e->getMessage()}";
    }
  }
}