<?php
require_once './db_connect.php';
require_once "./file_upload.php";

$id = $_GET["id"];
$sql = "SELECT * FROM `dishes` WHERE `dishID` = $_GET[id]";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["update"])) {
  $name = $_POST["name"];
  $price = $_POST["price"];
  $picture = fileUpload($_FILES["picture"]);
  $description = $_POST["description"];
  $long_description = $_POST["long_description"];

  if ($_FILES["picture"]["error"] == 0) {

    if ($row["image"] != "product.png") {
      unlink("pictures/$row[image]");
    }
    $sql = "UPDATE dishes SET image = '$picture[0]', name = '$name', description = '$description', long_description = '$long_description' , price = $price  WHERE id = {$id}";
  } else {
    $sql = "UPDATE dishes SET name = '$name', description = '$description', long_description = '$long_description' , price = $price  WHERE id = {$id}";
  }

  if (mysqli_query($connect, $sql)) {
    echo "<div class='alert alert-success pt-120' role='alert'>
    product has been updated, {$picture[1]}
  </div>";
    header("refresh: 3; url= index.php");
  } else {
    echo "<div class='alert alert-danger pt-120' role='alert'>
           error found, {$picture[1]}
         </div>";
  }
}


mysqli_close($connect);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/553d5d3b41.js" crossorigin="anonymous"></script>
  <title>Restaurant Database</title>
</head>

<body>
  <?php require_once "navbar.php"; ?>
  <div class="container pt-120">
    <h2>Create a new product</h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" aria-describedby="price" name="price">
      </div>
      <div class="mb-3 mt-3">
        <label for="description" class="form-label">Short description</label>
        <input type="text" class="form-control" id="description" aria-describedby="description" name="description">
      </div>
      <div class="mb-3 mt-3">
        <label for="long_description" class="form-label">Long description</label>
        <input type="text" class="form-control" id="long_description" aria-describedby="long_description" name="long_description">
      </div>
      <div class="mb-3">
        <label for="picture" class="form-label">Picture</label>
        <input type="file" class="form-control" id="picture" aria-describedby="picture" name="picture">
      </div>
      <button name="update" type="submit" class="btn btn-dark me-3">Update product</button>
      <a href="index.php" class="btn btn-outline-secondary">Back to home page</a>
    </form>
  </div>
  </div>
</body>

</html>