<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once './db_connect.php';

$sql = "SELECT * FROM dishes";

$result = mysqli_query($connect, $sql);


// $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $cards  .= "
    <div class='m-03'>
      <div class='card'>
          
          <img src='pictures/{$row['image']}' alt=''>
          <div class='details'>
              <label>{$row['name']}</label>
              <p>&euro; {$row['price']}</p>
              <a href='details.php?id={$row['dishID']}' class='btn'>Details</a>
          </div>
      </div>
    </div>
        ";
  }
} else {
  $cards =  " <p> No  results found </p> ";
}
mysqli_close($connect);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/553d5d3b41.js" crossorigin="anonymous"></script>
  <title>Restaurant Database</title>
</head>

<body>
  <?php require_once "navbar.php"; ?>
  <div class="container pt-120">
    <h1>Menu</h1>
    <div class="grid-container">
      <!--  -->
      <?= $cards ?>
      <!--  -->
    </div>
  </div>
</body>

</html>