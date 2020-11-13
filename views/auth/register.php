<div class="mx-auto">
  <form action="<?= __URL__ ?>auth/postRegister" method="POST" class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    <label for="inputName" class="sr-only">Name</label>
    <input type="text" id="inputName" name="nombre" class="form-control mb-3" placeholder="Name" required="" autofocus="">
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="email" class="form-control mb-3" placeholder="Email address" required="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control mb-3" placeholder="Password" required="">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>
</div>