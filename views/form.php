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
        <p class="lead">A skeleton application for fhooe/router.</p>

        <h2>GET /form</h2>
        <p>This is the view for the "GET /form" route, a simple PHP-based form.</p>
        <p>It submits to the "POST /formresult" route which is resolved through <code>Router::urlFor()</code>.</p>

        <div class="border p-3 mt-5">
            <h3>Example Login Form</h3>
            <form method="post" action="<?= Router::urlFor("POST /formresult") ?>">
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="emailInput" name="emailInput"
                           placeholder="you@example.com" aria-describedby="emailHelp" autocomplete="email" required>
                    <div id="emailHelp" class="form-text">Please enter the email address you registered with.</div>
                </div>
                <div class="mb-3">
                    <label for="passwordInput" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordInput" name="passwordInput"
                           placeholder="Password" aria-describedby="passwordHelp" autocomplete="current-password"
                           required>
                    <div id="passwordHelp" class="form-text">Please enter your selected password.</div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberCheck" name="rememberCheck">
                    <label class="form-check-label" for="rememberCheck">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
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
<script src="../vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>
