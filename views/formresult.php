<?php

use Fhooe\Router\Router;

$basePath = Router::getBasePath();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>fhooe/router-skeleton: POST /formresult</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-lg">
            <a class="navbar-brand" href="<?= $basePath ?>/">
                <img src="../views/images/fhooe.svg" alt="" height="30" class="d-inline-block align-text-top">
                fhooe/router-skeleton
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= $basePath ?>/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="form">PHP Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="twigform">Twig Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="a/route/that/does/not/exist">Unknown Route (404)</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="container-lg mt-lg-4">
        <h1>fhooe/router-skeleton</h1>
        <p class="lead">A skeleton application for the fhooe/router.</p>

        <h2>POST /formresult</h2>
        <p>This is the view for the "POST /formresult" route, a simple PHP-based form.</p>
        <p>It shows the result of the "GET /form" route after it was submitted..</p>

        <div class="alert alert-primary mt-5" role="alert">
            Login successful!
        </div>

        <div class="border p-3 mt-5">
            <h3>Example Login Form Result</h3>
            <?php
            if (isset($_POST["emailInput"])) {
                echo "<p>Welcome, <strong>" . $_POST["emailInput"] . "</strong>. You have been logged in.</p>";
            }
            ?>
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
<script src="../vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>

