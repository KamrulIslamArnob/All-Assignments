<!-- Task 2: Array Manipulation
Create an array called $numbers containing the numbers 1 to 10. Write a PHP function which takes the "$numbers" array as an argument to remove the even numbers from the array and print the resulting array. -->

<?php

function removeEvenNumber(&$numbers){
    $newArray = [];
    for($i = 0; $i < count($numbers) ; $i++ ){
        if ($numbers[$i]%2==1){
            $newArray[] = $numbers[$i];

        }
    }
    $numbers = $newArray;
}

$numbers = [1,2,3,4,5,6,7,8,9,10];
removeEvenNumber($numbers);
print_r($numbers);
