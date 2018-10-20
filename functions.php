<?php

function validation($data) {
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);

    return $data;
}



function register($entername, $enterpassword, $enteremail) {
    $users = 'users.txt';
    // блок валидации
    $name = strip_tags($entername);
    $email = strip_tags($enteremail);
    $password = strip_tags($enterpassword);

    if ($name == '' ||  $email == '' || $password == '') {
        echo "<h3>Поле должно быть не пустым</h3>";
        return false;
    }

    if (strlen($name) < 3 || strlen($name) > 30) {
        echo "<h3>Имя должно быть в пределах от 3 до 30 символов</h3>";
        return false;
    }

    // Проверяем логин на уникальность

    // открываем файл
    $file = fopen($users, 'a+');

    // проходим по файлу и записываем каждую строку в перемменную
    while($line = fgets($file)) {

        // login:37838d8jdghdyghddhs:admin@admin.com
        // вытаскиваем логин
        $readname = substr($line, 0, strpos($line, ':'));

        // сравниваем входящий с имеющимися
        if ($readname == $name) {
            echo "<h3>Логин должен быть уникальным</h3>";
            return false;
        }
    }

    // запись юзера в файл
    // login:37838d8jdghdyghddhs:admin@admin.com
    $line = $name .':'. md5($password) . ':' . $email . PHP_EOL;
    fputs($file, $line);
    fclose($file);
    return true;
}