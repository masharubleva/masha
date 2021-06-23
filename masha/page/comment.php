<?php
  /* Принимаем данные из формы */



  $page_id = $_POST["page_id"];
  $text_comment = $_POST["text_comment"];
  $name = htmlspecialchars($name);// Преобразуем спецсимволы в HTML-сущности
  $text_comment = htmlspecialchars($text_comment);// Преобразуем спецсимволы в HTML-сущности
  $link = mysqli_connect("localhost", "root", "", "masha");// Подключается к базе данных
  $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
  $userdata = mysqli_fetch_assoc($query);
  $name = $userdata['user_id'];
  $query = ("INSERT INTO `comment` (`id`, `id_post`, `id_user`, `text`) VALUES (NULL, '$page_id', '$name', '$text_comment')");
  mysqli_query($link, $query) or die("Ошибка " . mysqli_error($mysqli));
  // Добавляем комментарий в таблицу
  header("Location: ".$_SERVER["HTTP_REFERER"]);// Делаем реридект обратно
?>
