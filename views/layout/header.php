<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi sitio web</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a href="/" class="navbar-brand h1">MINI</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="<?= __URL__ ?>" class="nav-link">Home</a>
                </li>
                <?php if(isset($_SESSION['user'])) : ?>
                    <li class="nav-item">
                        <a href="<?= __URL__ ?>auth/exit" class="nav-link">Sign out</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="<?= __URL__ ?>auth" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= __URL__ ?>auth/register" class="nav-link">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            
        