<!DOCTYPE html>
<html>
<head>
    <title>Grade Calculator</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Grade Calculator</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="input-group">
                <label for="score1">Test Score 1:</label>
                <input type="number" name="score1" id="score1" required>
            </div>
            
            <div class="input-group">
                <label for="score2">Test Score 2:</label>
                <input type="number" name="score2" id="score2" required>
            </div>
            
            <div class="input-group">
                <label for="score3">Test Score 3:</label>
                <input type="number" name="score3" id="score3" required>
            </div>
            
            <div class="input-group">
                <input type="submit" value="Calculate">
            </div>
        </form>
        
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            $score1 = $_POST["score1"];
            $score2 = $_POST["score2"];
            $score3 = $_POST["score3"];
           
            $average = ($score1 + $score2 + $score3) / 3;
           
            $letterGrade = "";

            if ($average >= 90) {
                $letterGrade = "A";
            } elseif ($average >= 80) {
                $letterGrade = "B";
            } elseif ($average >= 70) {
                $letterGrade = "C";
            } elseif ($average >= 60) {
                $letterGrade = "D";
            } else {
                $letterGrade = "F";
            }

            echo "<div class='result'>Average Score: $average</div>";
            echo "<div class='result'>Letter Grade: $letterGrade</div>";
        }
        ?>
    </div>
</body>
</html>
