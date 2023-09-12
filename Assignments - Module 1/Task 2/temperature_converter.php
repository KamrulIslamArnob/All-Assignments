<!DOCTYPE html>
<html>

<head>
    <title>Temperature Converter</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Temperature Converter</h1>

    <?php

    $temperature = "";
    $conversionType = "celsiusToFahrenheit";
    $result = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $temperature = $_POST["temperature"];
        $conversionType = $_POST["conversionType"];

        if ($conversionType == "celsiusToFahrenheit") {
            $result = ($temperature * 9 / 5) + 32;
        } elseif ($conversionType == "fahrenheitToCelsius") {
            $result = ($temperature - 32) * 5 / 9;
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="temperature">Enter Temperature:</label>
        <input type="number" name="temperature" id="temperature" value="<?php echo $temperature; ?>" required>

        <label for="conversionType">Select Conversion:</label>
        <select name="conversionType" id="conversionType">
            <option value="celsiusToFahrenheit" <?php if ($conversionType == "celsiusToFahrenheit") {
                                                    echo "selected";
                                                }
                                                ?>>Celsius to Fahrenheit</option>
            <option value="fahrenheitToCelsius" <?php if ($conversionType == "fahrenheitToCelsius") {
                                                    echo "selected";
                                                }
                                                ?>>Fahrenheit to Celsius</option>
        </select>

        <input type="submit" value="Convert">
    </form>

    <?php
    if ($result !== "") {
        echo "<p>Converted Temperature: $result</p>";
    }
    ?>

</body>

</html>