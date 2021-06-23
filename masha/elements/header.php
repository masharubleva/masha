<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="../page/add.php">Добавить статью</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="/index.php">Large</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="link-secondary" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>

        <?
        $host = 'localhost'; // адрес сервера
        $server = 'localhost'; // адрес сервера
        $database = 'masha'; // имя базы данных
        $user = 'admin'; // имя пользователя
        $password = '12345678'; // пароль
        $pass = '12345678'; // пароль
        $link = mysqli_connect($host, $user, $password, $database);
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
        {
            $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
            $userdata = mysqli_fetch_assoc($query);

            if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id']))
            {
                setcookie("id", "", time() - 3600*24*30*12, "/");
                setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true); // httponly !!!
                echo '<a class="btn btn-sm btn-outline-secondary" href="page/login.php">Sign up</a>';
            }
            else
            {
                echo' <a class="mx-2 " href="../page/lk.php">'.$userdata['user_login'].'</a>';
                print ' ';
                echo '<a class="link-secondary" href="../page/logout.php"> Выход</a>';

            }
        }
        else

        echo '<a class="btn btn-sm btn-outline-secondary" href="../page/login.php">Sign up</a>';

        ?>





      </div>
    </div>
  </header>
<?//require_once 'db/connection.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
$query = "SELECT * FROM tems";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if($result)
$rows = mysqli_num_rows($result);





  echo'<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">';



      for ($i = 0 ; $i < $rows ; ++$i)
      {

             $row = mysqli_fetch_row($result);
      echo '<a class="p-2 link-secondary" href="/index.php/?tem='.$row[2].'">'.$row[1].'</a>';
    }
      mysqli_free_result($result);
      ?>
    </nav>
  </div>
</div>
