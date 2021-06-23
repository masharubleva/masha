<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>site</title>
  </head>
  <body>
    <? require_once'../elements/header.php' ?>


    <h1 class="mx-5">Личный кабинет</h1>

    <?





    include_once('../db/connection.php');
    $link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));


    $log = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($log);
    $userouth=$userdata['user_login'];
    // выполняем операции с базой данных

    $query = "SELECT * FROM post WHERE autor='$userouth'";

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if($result)
    $rows = mysqli_num_rows($result); // количество полученных строк

            echo "<div class='container'>
            <div class='row'>
                <div class='col-4'>
                    <ul class='my-02'>";?>




                      <?// смена пароля

                      if(isset($_POST['submit']))
                      {
                          $err = [];



                          // Если нет ошибок, то добавляем в БД нового пользователя
                          if(count($err) == 0)
                          {

                              $login = $userouth;

                              // Убераем лишние пробелы и делаем двойное хеширование
                              $password = md5(md5(trim($_POST['newpassword'])));

                              mysqli_query($link,"UPDATE `users` SET `user_password`=[.$password.], WHERE `user_login`=[.$login.]");
                              header("Location: login.php"); exit();
                          }
                          else
                          {
                              print "<b>При регистрации произошли следующие ошибки:</b><br>";
                              foreach($err AS $error)
                              {
                                  print $error."<br>";
                              }
                          }
                      }


                      ?>
                      <form method="POST">


                      новый Пароль <br>
                      <input name="newpassword" type="password" required><br>

                      <input name="submiti" type="submit" value="изменить пароль">
                      </form>
    <?php echo "
                    </ul>
                    </div>
                    <div class='col'><h3>Мои статьи</h3>";



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
                                <a href="/page/statya.php?article='.$row[0].'" class="stretched-link">редактировать(не доделано)</a>
                              </div>
                              <div class="col-auto d-none d-lg-block">
                                <img width="200" height="250" src="https://st2.depositphotos.com/1064024/10769/i/600/depositphotos_107694484-stock-photo-little-boy.jpg">
                              </div>
                            </div>
                          </div>';



                        if( ($i % 2) == 1) echo'</div>';
            }
            echo '</div></div>
        </div>';

          // очищаем результат
        mysqli_free_result($result);
    ?>









    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  </body>
</html>
