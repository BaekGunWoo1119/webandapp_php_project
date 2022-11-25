<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>PHP & MariaDB</title>
  </head>
  <body>
    <?php
      $jb_connect = mysqli_connect( 'localhost', 'root', '', 'bbs' );
      if ( $jb_connect == false ) {
        echo "<p>Failure - ". mysqli_connect_error() ."</p>";
      } else {
        echo "<p>Success</p>";
      }
    ?>
  </body>
</html>