<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';

$request = new App\Http\Request;
$request->send();