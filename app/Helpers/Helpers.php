<?php 

if (!function_exists('viewPath'))
{
  function viewPath($view)
  {
    return __DIR__ . "/../../views/$view.php";
  }
}

if (!function_exists('view'))
{
  function view($view)
  {
    return new App\Http\Response($view);
  }
}

if (!function_exists('msg'))
{
  function msg($type = 'success', $msg)
  {
    $alert = "
    <div class='alert alert-{$type}' role='alert'>
        <strong>{$msg}</strong>
    </div>";
    unset($_SESSION['type']);
    unset($_SESSION['msg']);
    return $alert;
  }
}