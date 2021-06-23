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

    <main class="container">




      <div class="row">
        <div class="col-md-8">
          <?


          include_once('../db/connection.php');
          $link = mysqli_connect($host, $user, $password, $database)
          or die("Ошибка " . mysqli_error($link));



          $posts = ($_GET["article"]);
          $query = "SELECT * FROM post WHERE id=$posts";

          $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
          $row = mysqli_fetch_row($result);

                echo'
                <article class="blog-post">
                  <h2 class="blog-post-title">'.$row[3].'</h2>
                  <p class="blog-post-meta">'.$row[6].' '.$row[7].'by <a href="#">'.$row[2].'</a></p>
                  <img height="200px" src="../img/'.$row[8].'">
                  <p>'.$row[5].'</p>

                </article><!-- /.blog-post -->

                ';
          ?>

          <div class="container">
          <div class="row">
            <div class="col-4"></div>
            <div class="col-4">

          <form name="comment" action="comment.php" method="post">

            <p>
              <label>Комментарий:</label>
              <br />
              <textarea name="text_comment" cols="30" rows="5"></textarea>
            </p>
            <p>
              <input type="hidden" name="page_id" value="<?echo ''.$_GET["article"].'';?>" />
              <input type="submit" value="Отправить" />
            </p>
          </form>
          </div>
          <div class="col"></div>
          </div>
          </div>


          <?







          $article = $_GET['article'];

          //SELECT * FROM comment c INNER JOIN post p ON c.id_post = p.id
          $query = "SELECT * FROM users INNER JOIN comment ON comment.id_user = users.user_id WHERE comment.id_post = $article";

          $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
          if($result)
          $rows = mysqli_num_rows($result); // количество полученных строк
           for ($i = 0 ; $i < $rows ; ++$i)
           {
                  $row = mysqli_fetch_row($result);
                echo  '<div class="row"><strong>'.$row[1].'</strong></div>
                <div>'.$row[7].'</div><hr>' ;









          }

          // очищаем результат
           mysqli_free_result($result);
          ?>


        </div>

        <div class="col-md-4">
          <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">About</h4>
            <p class="mb-0">Saw you downtown singing the Blues. Watch you circle the drain. Why don't you let me stop by? Heavy is the head that <em>wears the crown</em>. Yes, we make angels cry, raining down on earth from up above.</p>
          </div>

          <?require_once'../elements/archives.php'; ?>


        </div>

      </div><!-- /.row -->

    </main><!-- /.container -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
