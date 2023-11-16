<?php
require_once './db_connect.php';
require_once "file_upload.php";

$sql = "SELECT * FROM dishes";

$result = mysqli_query($connect, $sql);



// $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 0) {
  $cards  .= "
    <div class='m-03'>
      <div class='card'>
          
          <img src='{$row['image']}' alt=''>
          <div class='details'>
              <a href='#' class='btn'>Details</a>
          </div>
      </div>
    </div>
        ";
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
  <div class="container  pt-120">

    <h1><?= $row['name'] ?></h1>
    <p><?= $row['description'] ?></p>
    <p><?= $row['long_description'] ?></p>
    <p>&euro; <?= $row['price'] ?></p>
    <a href='' class='btn'>Update</a>

    <!--  -->
    <?= $cards ?>
    <!--  -->
  </div>
</body>

</html>