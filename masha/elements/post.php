<?
    require_once 'db/connection.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
$tem = 0;
$tem = $_GET["tem"];
$prov = '';
/*if(($tem) == ($prov))
{
$query = "SELECT * FROM post ";
}
else {
  $year = $_GET["years"];
  $mount = $_GET["mounts"];
  $query = "SELECT * FROM `post` WHERE `tema` LIKE '$tem'";
}*/
$year = $_GET["years"];
$mount = $_GET["mounts"];

if (($tem) == ($prov) and ($year) == ($prov)) {
    $query = "SELECT * FROM post ";
} elseif (($year) !== ($prov) and ($tem == $prov)) {
    $query = "SELECT * FROM post WHERE MONTH(date) = $mount AND YEAR(date) = $year";
} elseif (($tem) !== ($prov)) {
    $query = "SELECT * FROM `post` WHERE `tema` LIKE '$tem'";
}

//echo "$query";
// выполняем операции с базой данных


$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if($result)
$rows = mysqli_num_rows($result); // количество полученных строк




 for ($i = 0 ; $i < $rows ; ++$i)
 {
        $row = mysqli_fetch_row($result);



            if( ($i % 2) == 0) echo'<div class="row mb-2">';

            echo'
              <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                  <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">'.$row[1].'</strong>
                    <h3 class="mb-0">'.$row[3].'</h3>
                    <div class="mb-1 text-muted">'.$row[6].' '.$row[7].'</div>
                    <p class="card-text mb-auto">'.$row[5].'</p>
                    <a href="/page/statya.php?article='.$row[0].'" class="stretched-link">Continue reading</a>
                  </div>
                  <div class="col-auto d-none d-lg-block">
                    <img width="200" height="250" src="https://st2.depositphotos.com/1064024/10769/i/600/depositphotos_107694484-stock-photo-little-boy.jpg">
                  </div>
                </div>
              </div>';



            if( ($i % 2) == 1) echo'</div>';
        }



   // очищаем результат
    mysqli_free_result($result);

?>
