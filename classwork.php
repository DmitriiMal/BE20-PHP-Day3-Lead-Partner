<?php

// ////////// //
// Exercise 1 //
// ////////// //

$forLoop = '';

for ($i = 0; $i < 50; $i++) {
  $forLoop .= "<p class='text-info-emphasis'>forLoop</p>";
}

$whileLoop = '';

$i = 0;

while ($i < 50) {
  $whileLoop .= "<p class='text-success-emphasis'>whileLoop</p>";
  $i++;
}

$doWhileLoop = '';

$j = 0;

do {
  $doWhileLoop .= "<p class='text-warning-emphasis'>doWhileLoop</p>";
  $j++;
} while ($j < 50);


// ////////// //
// Exercise 2 //
// ////////// //

$ex2 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

$ex2Output = "";

foreach ($ex2 as $val) {
  $ex2Output .= "<span class='mx-2'>$val</span>";
}


// ////////// //
// Exercise 3 //
// ////////// //

// $ex3 = array(50, 41, 47, 29, 5, 146, 32, 3, 1, 10);

$ex3 = rand(0, 100);


$arr = array_map(function () {
  return rand(0, 100);
}, array_fill(0, 10, null));


foreach ($arr as $ar) {
  echo $ar;
}

function getMax($array)
{
  return max($array);
};

$ex3Output = getMax($arr);


// ////////// //
// Exercise 4 //
// ////////// //

// for ($i = 1; $i <= 100; $i++) {
//   if ($i % 3 == 0) {
//     echo "<p>Back-End</p>";
//   } else {
//     echo "<p>$i</p>";
//   }
// };


// $ex3Output = "";

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="container">

    <hr class="mt-5">
    <!-- ---------- -->
    <h1>Exercise 1</h1>
    <!-- ---------- -->

    <div class="container my-4 row row-cols-3">
      <div>
        <?= $forLoop ?>
      </div>
      <div>
        <?= $whileLoop ?>
      </div>
      <div>
        <?= $doWhileLoop ?>
      </div>
    </div>

    <hr class="mt-5">
    <!-- ---------- -->
    <h1>Exercise 2</h1>
    <!-- ---------- -->

    <div class="container my-4">
      <?= $ex2Output ?>
    </div>

    <hr class="mt-5">
    <!-- ---------- -->
    <h1>Exercise 3</h1>
    <!-- ---------- -->

    <div class="container my-4">
      <?= $ex3Output ?>
    </div>

    <hr class="mt-5">
    <!-- ---------- -->
    <h1>Exercise 4</h1>
    <!-- ---------- -->

    <div class="container my-4">
      <?php

      for ($i = 1; $i <= 100; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
          echo "<p class='text-danger-emphasis'>Fullstack</p>";
        } elseif ($i % 3 == 0) {
          echo "<p class='text-primary-emphasis'>Back-End</p>";
        } elseif ($i % 5 == 0) {
          echo "<p class='text-success-emphasis'>Front-End</p>";
        } else {
          echo "<p>$i</p>";
        }
      };

      ?>
    </div>


  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>