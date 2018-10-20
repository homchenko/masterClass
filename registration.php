<?php

include 'functions.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h3>Registration Form</h3>
    <?php

    if (!isset($_POST['regbtn'])) {
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" class="form-control" name="login" required>
            </div>
            <div class="form-group">
                <label for="pass1">Password:</label>
                <input type="password" class="form-control" name="pass1">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="email">
            </div>
            <button type="submit" class="btn btn-primary" name="regbtn">Register</button>
        </form>
    <?php
    } else {
        if (register($_POST['login'], $_POST['pass1'], $_POST['email'])) {
            echo "Регистрация пройдена";
        }
    }
    ?>
</div>
</body>
</html>