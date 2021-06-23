<?php
require_once '../db/connection.php'; // подключаем скрипт

    $date = date("Y-m-d");
    $time = date("G:i:s");
    $link = mysqli_connect($host, $user, $password, $database);
    $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query)or die("Ошибка " . mysqli_error($link));
    $autor = $userdata['user_login'];

if (isset($_POST['name']) && isset($_POST['text'])) {

    // подключаемся к серверу

    $tema = NULL;


    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $text = htmlentities(mysqli_real_escape_string($link, $_POST['text']));
    $pretext = htmlentities(mysqli_real_escape_string($link, $_POST['pretext']));
    $tema = htmlentities(mysqli_real_escape_string($link, $_POST['tema']));




    // Путь загрузки
    $path = '../img/';

// Обработка запроса
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Загрузка файла и вывод сообщения
        $img = $_FILES['picture']['name'];
        if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
            echo 'Что-то пошло не так';
        else
            header ('Location: ../index.php');
    }

}

// подключаемся к серверу
// создание строки запроса
$query = "INSERT INTO `post` (`id`, `tema`, `autor`, `head` ,`pretext`, `text`, `date`, `time`, `img`) VALUES (NULL, '$tema', '$autor', '$name', '$pretext', '$text', '$date', '$time', '$img')";
echo ''.$query.'';
// выполняем запрос
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if ($result) {
    echo "<span style='color:blue;'>Данные добавлены</span>";
}


// закрываем подключение
mysqli_close($link);
