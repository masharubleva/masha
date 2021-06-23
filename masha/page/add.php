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










          <form method="post" action="up.php" enctype="multipart/form-data" class="mx-auto" style="width: 250px">
            <h4>Добавить статью</h4>
          <div class="form-group">
          <label for="exampleInputEmail1">Название</label>
          <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          </div>
          <div class="form-group">
          <label for="exampleFormControlTextarea1">Статья</label>
          <textarea name="text" type="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

          </div>
          <div class="form-group">
          <label for="exampleFormControlTextarea1">Короткое описание</label>
          <textarea name="pretext" type="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

          </div>
          <div class="form-group">



              <label for="exampleFormControlTextarea1">Тема</label>
              <select name="tema">

                <option selected="selected">NULL</option>
                <?require_once '../db/connection.php'; // подключаем скрипт

                // подключаемся к серверу
                $link = mysqli_connect($host, $user, $password, $database)
                or die("Ошибка " . mysqli_error($link));
                $query = "SELECT * FROM tems";
                $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                if($result)
                $rows = mysqli_num_rows($result);


                      for ($i = 0 ; $i < $rows ; ++$i)
                      {

                             $row = mysqli_fetch_row($result);
                    echo '<option>'.$row[1].'</option>';
                    }
                    mysqli_free_result($result);


                ?>
              </select>






          </div>






          <div >
          <input type="file" name="picture">
          <input type="submit" value="Загрузить">
          </div>
          </form>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
