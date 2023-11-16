<?php
require_once './db_connect.php';

if (isset($_GET["id"]) && !empty($_GET["id"])) {

  $id = $_GET["id"];
  $sql = "SELECT * FROM `dishes` WHERE `dishID` = $_GET[id]";
  $result = mysqli_query($connect, $sql);
  $cards = "";

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $cards  .= "
    <div class='m-03'>
      <div class='card'>
      <img src='pictures/{$row[0]['image']}' alt=''>
      <div class='details'>
      <a href='update.php?id=$id' class='tn'>Update</a>
      </div>
      </div>
      </div>
      ";
  } else {
    $cards =  " <p> No  data found </p> ";
  }
}





// mysqli_close($connect);

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
  <div class="container  pt-120">


    <h1><?= $row[0]['name'] ?></h1>
    <p><?= $row[0]['description'] ?></p>
    <p><?= $row[0]['long_description'] ?></p>
    <p>&euro;<?= $row[0]['price'] ?></p>
    <a href='update.php?id=<?= $id ?>' class='btn'>Update</a>
    <!--  -->
    <?= $cards ?>
    <!--  -->
  </div>
</body>

</html>