<!DOCTYPE html>
<html>
<head>
    <title>Even or Odd Checker</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Even or Odd Checker</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="input-group">
                <label for="number">Enter a Number:</label>
                <input type="number" name="number" id="number" required>
            </div>
            
            <div class="input-group">
                <input type="submit" value="Check">
            </div>
        </form>
        
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = $_POST["number"];
            $message = ($number % 2 == 0) ? "The number $number is even." : "The number $number is odd.";
            echo "<div class='result'>$message</div>";
        }
        ?>
    </div>
</body>
</html>
