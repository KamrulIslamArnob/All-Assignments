<!DOCTYPE html>
<html>

<head>
  <title>Comparison Tool</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    form {
      margin-bottom: 20px;
    }

    input[type="number"] {
      width: 100px;
      margin-right: 10px;
    }

    input[type="submit"] {
      padding: 5px 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
    }

    .result {
      font-size: 18px;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <h1>Comparison Tool</h1>
  <form action="comparison_tool.php" method="post">
    <input type="number" name="num1" placeholder="First Number">
    <input type="number" name="num2" placeholder="Second Number">
    <input type="submit" value="Compare">
  </form>

  <?php
  if (isset($_POST['num1']) && isset($_POST['num2'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    $larger = $num1 > $num2 ? $num1 : $num2;

    echo "<div class=\"result\">The larger number is $larger.</div>";
  }
  ?>

</body>

</html>