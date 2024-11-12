<?php
$error = "";
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $num1 = $_POST["num1"];
  $num2 = $_POST["num2"];
  $operation = $_POST["option"];

  if (is_numeric($num1) && is_numeric($num2)) {
    switch ($operation) {
      case "Addition": 
        $result = $num1 + $num2;
        break;
      case "Subtraction": 
        $result = $num1 - $num2;
        break;
      case "Multiplication": 
        $result = $num1 * $num2;
        break;
      case "Division":
        if ($num2 != 0) {
          $result = $num1 / $num2;
        } else {
          $error = "Cannot divide by zero";
        }
        break;
      default:
        $error = "Invalid operation";
    }
  } else if (empty($num1) || empty($num2)) {
    $error = "Please enter both numbers";
  } else {
    $error = "Invalid input, try again";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="container">
      <h1>Basic PHP Calculator</h1>
      <form action="#" method="POST">
        <input type="text" name="num1" placeholder="Enter Number 1">
         <input type="text" name="num2" placeholder="Enter Number 2">
        <select name="option">
        <option value="Addition" name="add">Addition</option>
        <option value="Subtraction" name="sub">Subtraction</option>
        <option value="Multiplication" name="mult">Multiplication</option>
        <option value="Division" name="div">Divide</option>
        </select>
        <input type="submit" name="submit">
      </form>
   </div> 

   <?php

    if(!empty($result)) {
      echo "The Answer Is: $result";
    }
    else if(!empty($num1) || !empty($num2)) {
      echo "<span>Please Input Both Numbers</span>";
    }

  ?>
</body>
</html>
