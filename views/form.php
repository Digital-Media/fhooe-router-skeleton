<?php

use Fhooe\Router\Router;

$basePath = Router::getBasePath();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>fhooe/router-skeleton: GET /form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $basePath ?>/../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $basePath ?>/../vendor/twbs/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-lg">
            <a class="navbar-brand" href="<?= $basePath ?>/">
                <img src="<?= $basePath ?>/../views/images/fhooe.svg" alt="" height="30" class="d-inline-block align-text-top">
                fhooe/router-skeleton
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="form">PHP Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="twigform">Twig Form</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="container-lg mt-lg-4">
        <h2>GET /form</h2>
        <p>This is the view for the "GET /form" route, a simple PHP-based form.</p>
        <p>It submits to the "POST /form" route which is resolved through <code>Router::urlFor()</code>.
           The result is only shown, when $_POST['nameInput'] is present</p>

            <?php
            if (isset($_POST["nameInput"])) {
                echo "<div class='border p-3 mt-5'>";
                    echo "<h3>Example PHP Template Form Result</h3>";
                    echo "<p>Welcome, <strong>" . $_POST["nameInput"] ;
                    echo "<div class='alert alert-primary mt-5' role='alert'>";
                        echo "<p>You successfully entered your name!</p>";
                    echo "</div>";
                echo "</div>";
            }
            ?>


        <div class="border p-3 mt-5">
            <h3>Example PHP Template Form</h3>
            <form method="post" action="<?= Router::urlFor("POST /form") ?>">
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="nameInput" name="nameInput"
                           placeholder="your name" aria-describedby="nameHelp" autocomplete="name" required>
                    <div id="nameHelp" class="form-text">Please enter your name.</div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberCheck" name="rememberCheck">
                    <label class="form-check-label" for="rememberCheck">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</main>

<div class="container-lg">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-lg-9 d-flex align-items-center">
            <img src="../views/images/fhooe.svg" alt="" height="24" class="me-2">
            <span class="text-muted">© FH Oberösterreich | Department of Digital Media</span>
        </div>

        <ul class="nav col-lg-3 justify-content-end list-unstyled d-flex">
            <li class="ms-3">
                <a class="text-muted" href="https://github.com/Digital-Media/fhooe-router-skeleton">
                    <i class="bi-github"></i>
                </a>
            </li>
        </ul>
    </footer>
</div>
<script src="<?= $basePath ?>/../vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>
