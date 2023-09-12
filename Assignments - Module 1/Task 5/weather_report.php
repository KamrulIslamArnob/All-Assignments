<!DOCTYPE html>
<html>

<head>
  <title>Weather Report</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Weather Report</h1>
  <form action="weather_report.php" method="post">
    <label for="temperature">Temperature:</label>
    <input type="number" id="temperature" name="temperature">
    <input type="submit" value="Get Weather">
  </form>
  <div class="result">
    <?php
    $temperature = $_POST['temperature'];

    if ($temperature < 32) {
      echo "It's freezing!";
    } elseif ($temperature < 60) {
      echo "It's cool.";
    } else {
      echo "It's warm.";
    }
    ?>
  </div>
</body>

</html>