<!DOCTYPE html>
<html>

<head>
  <title>Simple Calculator</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Simple Calculator</h1>
  <form action="simple_calculator.php" method="post">
    <input type="number" name="num1" placeholder="First Number">
    <input type="number" name="num2" placeholder="Second Number">
    <select name="operation">
      <option value="add">Addition</option>
      <option value="subtract">Subtraction</option>
      <option value="multiply">Multiplication</option>
      <option value="divide">Division</option>
    </select>
    <input type="submit" value="Calculate">
  </form>

  <?php
  if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operation'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];

    switch ($operation) {
      case 'add':
        $result = $num1 + $num2;
        break;
      case 'subtract':
        $result = $num1 - $num2;
        break;
      case 'multiply':
        $result = $num1 * $num2;
        break;
      case 'divide':
        if ($num2 == 0) {
          $result = 'Error: division by 0';
        } else {
          $result = $num1 / $num2;
        }
        break;
    }

    echo "Result: $result";
  }
  ?>

</body>

</html>