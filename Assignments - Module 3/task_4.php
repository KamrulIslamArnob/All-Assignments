<!-- Task 4: Multidimensional Array
Create a multidimensional array called $studentGrades to store the grades of three students. Each student has grades for three subjects: Math, English, and Science. Write a PHP function which takes "$studentGrades" as an argument to calculate and print the average grade for each student.
 -->

 <?php

$studentGrades = array(
    array('Math' => 85, 'English' => 92, 'Science' => 78),
    array('Math' => 88, 'English' => 95, 'Science' => 90),
    array('Math' => 75, 'English' => 82, 'Science' => 70)
);
function calculateAverageGrades($grades) {
    foreach ($grades as $index => $student) {
        $total = array_sum($student);
        $count = count($student);
        $average = $total / $count;
        
        echo "Student " . ($index + 1) . " - Average Grade: " . number_format($average, 2) . "\n";
    }
}

calculateAverageGrades($studentGrades);

