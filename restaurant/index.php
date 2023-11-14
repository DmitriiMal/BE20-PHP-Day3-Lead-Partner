<?php require_once './db_connect.php';

$sql = "SELECT * FROM dishes";

$result = mysqli_query($connect, $sql);


$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $cards  .= "
         <div>
           <div class='card'  style='width: 18rem;'>
                  <img src='pictures/{$row["picture"]}'  class='card-img-top'  alt='...' >
                  <div class= 'card-body' >
                  <h5 class='card-title' >{$row["name"]}</h5>
                  <p class='card-text' >{$row["price"]}</p>
                  <a href='#'   class='btn btn-primary'>Go  somewhere</a>
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
  <title>Restaurant Database</title>
</head>

<body>
  <div class="container">
    <h1>Menu</h1>
    <div class="grid-container">
      <!--  -->
      <div class="card">
        <div class="remove-when-use">
          <!-- <label>Hover over me to show details</label> -->
        </div>
        <div class="details">
          <label>name</label>
          <p>&euro; price</p>
          <a href="#" class="btn">Details</a>
        </div>
      </div>
      <!--  -->
    </div>
  </div>
</body>

</html>


<!-- img -->
<!-- name -->
<!-- price -->