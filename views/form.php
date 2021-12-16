<?php

use Fhooe\Router\Router;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>fhooe-router: GET /form &amp; POST /form</title>
</head>
<body>
<h1>GET and POST route</h1>
<p>This form demonstrates calling a POST route.</p>
<form method="post" action="<?= Router::urlFor("POST /form") ?>">
    <label for="firstName">First Name:</label>
    <input name="firstName" id="firstName">
    <button type="submit">Submit</button>
</form>

<?php
if (isset($_POST["firstName"])) {
    echo "<p>First name: <strong>" . $_POST["firstName"] . "</strong></p>";
}
?>
</body>
</html>
