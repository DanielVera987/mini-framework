<?php require_once('layout/header.php'); ?>
    <?php if(isset($_SESSION['user'])): ?>
      <div class="card text-left w-100">
        <div class="card-title">
          <h4 class="p-3 bg-light">Dashboard</h4>
        </div>
        <div class="card-body">
          <p class="card-text">Bienvenido <?= $_SESSION['user']['nombre'] ?></p>
        </div>
      </div>
    <?php else: ?>
      <div style="width: 100%; margin: 15rem;">
        <h2 style="text-align: center;">Mini-Framework</h2>
        <h4>
        <a href="https://github.com/DanielVera987" target="_blank" style="text-align: center;display:block;">
          Daniel Vera
        </a>
        </h4>
      </div>
    <?php endif; ?>
<?php require_once('layout/footer.php'); ?>