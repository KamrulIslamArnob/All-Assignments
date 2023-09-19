<!-- Task 4: Fibonacci Series printing using a Function
Write a PHP function to print the first 15 numbers in the Fibonacci series. You should take
this 15 as an argument of a function and use a for loop to generate these numbers and print
them by calling the function. -->

<?php
function fibonacci($n) {
    $first = 0;
    $second = 1;
    $count = 0;
    while ($count < $n) {
        $next = $first + $second;
        echo $next . " ";
        $first = $second;
        $second = $next;
        $count++;
    }
}

fibonacci(15);