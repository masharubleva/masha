<?
/*$host = 'localhost'; // адрес сервера
$server = 'localhost'; // адрес сервера
$database = 'masha'; // имя базы данных
$user = 'admin'; // имя пользователя
$password = '12345678'; // пароль
$pass = '12345678'; // пароль*/
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
$query = "SELECT DISTINCT month(date), year(date) FROM `post`";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if($result)
$rows = mysqli_num_rows($result);





  echo'<div class="p-4">
    <h4 class="fst-italic">Archives</h4>
    <ol class="list-unstyled mb-0">';



      for ($i = 0 ; $i < $rows ; ++$i)
      {
        $row = mysqli_fetch_row($result);
$mou = date("F", mktime(0, 0, 0, $row[0], 10));

      echo '<li><a href="../index.php?years='.$row[1].'&mounts='.$row[0].'">'.$mou.' '.$row[1].'</a></li>';
    }
      mysqli_free_result($result);






      ?>
    </ol>
    </div>
