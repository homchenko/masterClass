<?php
include 'functions.php';

//$name = $email = $password = '';
//$nameErr = $emailErr = '';

if ($_POST['submit']) { //нажата ли кнопка
//    if (empty($_POST['name'])) { // если переменная пустая
//        $nameErr = 'Name обязательно для заполнения';
//    } else {
//        $name = validation($_POST['name']);
//    }
//
//    if (empty($_POST['email'])) { // если переменная пустая
//        $emailErr= 'Email обязательно для заполнения';
//    } else {
//        $email = validation($_POST['email']);
//    }
    $errors = [];
    $data = [];
    foreach ($_POST as $key => $value) { // перебираем полученные данные
//        $key = 'name'; // первый проход
//        $key = 'email'; // второй проход
        if (empty($value)) {
            $errors[] = $key . ' должен быть не пустым';
        } else {
            $data[$key] = validation($value);
        }
    }
}

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
    <div class="row">
        <?php
        if ( count($errors) >= 1 ) { ?>
            <div class="alert alert-danger">
                <?php

                foreach ($errors as $error) {
                    echo $error . "<br>";
                }

                ?>
            </div>
        <?php
        }
        ?>
        <div class="w-100"></div>
        <form action="" method="post">
            <label for="name">Name</label>
            <input type="text" class="form-control mb-1" placeholder="name" name="name">
<!--            --><?php
//            if ($nameErr != '') {
//            ?>
<!--                <div class="alert alert-danger">-->
<!--                    --><?//= $nameErr; ?>
<!--                </div>-->
<!--            --><?php
//                }
//            ?>
            <label for="email">Name</label>
            <input type="text" class="form-control mb-1" placeholder="email" name="email">
<!--            --><?php
//            if ($emailErr != '') {
//                ?>
<!--            <div class="alert alert-danger">-->
<!--                --><?//= $emailErr; ?>
<!--            </div>-->
<!--            --><?php
//            }
//            ?>
            <div class="w-100"></div>
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
        </form>
    </div>
</div>
</body>
</html>