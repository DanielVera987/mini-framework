<?php require_once(__DIR__ . '/../layout/header.php'); ?>
<div class="mx-auto">
  <form class="form-signin">
    <?= (isset($type, $msg)) ? msg($type, $msg) : '' ?>
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control mb-3" placeholder="Email address" required="" autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Password" required="">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>
</div>