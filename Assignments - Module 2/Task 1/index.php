<!-- Task 1: Looping with Increment using a Function
Write a PHP function that uses a for loop to print all even numbers from 1 to 20, but with a
step of 2. In other words, you should print 2, 4, 6, 8, 10, 12, 14, 16, 18, 20. The function
should take the arguments like start as 1, end as 20 and step as 2. You must call the
function to print.
Also do the same using while loop and do-while loop also. -->

<?php

// While loop 
function incrementLoop($start, $end, $step)
{
    if (($start + 1) % 2 == 0) {
        $start++;
    }

    while ($start <= $end) {
        echo $start . ($start === $end ? "." : ",");
        $start += $step;
    }
}
echo "While loop : ";
echo PHP_EOL;
incrementLoop(1, 20, 2);
echo PHP_EOL;

// do - while loop
function incrementLoop1($start, $end, $step)
{
    if (($start + 1) % 2 == 0) {
        $start++;
    }

    do {
        echo $start . ($start === $end ? "." : ",");
        $start += $step;
    } while ($start <= $end);
}
echo "do-While loop : ";
echo PHP_EOL;
incrementLoop1(1, 20, 2);
echo PHP_EOL;

// for 

function incrementLoop2($start, $end, $step)
{
    if (($start + 1) % 2 == 0) {
        $start++;
    }

    for ($i = $start; $i <= $end; $i += $step) {
        echo $i . ($i === $end ? "." : ",");
    }
}
echo "For loop : ";
echo PHP_EOL;
incrementLoop2(1, 20, 2);
echo PHP_EOL;


