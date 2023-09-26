<!-- Task 1: String Manipulation
Create a string variable called $text with the value "The quick brown fox jumps over the lazy dog.". Write a PHP function which takes "$text" as an argument to:
Convert the string to all lowercase.
Replace "brown" with "red" in the string.
Print the modified text. -->

<?php
function allLowercase($text){
    $upText = strtolower($text);
    echo str_replace("brown","red",$upText);
}
$text = "The quick brown fox jumps over the lazy dog." ;
allLowercase($text);