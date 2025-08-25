<!--Write a simple program in PHP for 
    i) generating Prime number ii) generate Fibonacci series.-->

<?php

// Function to generate prime numbers up to a given number
function generatePrimes($maxNumber) {
    echo "Prime numbers up to $maxNumber: ";
    for ($number = 2; $number <= $maxNumber; $number++) {
        $isPrime = true;
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                $isPrime = false;
                break;
            }
        }
        if ($isPrime) {
            echo $number . " ";
        }
    }
    echo "<br>";
}

// Function to generate Fibonacci series for n terms
function fibonacciSeries($numTerms) {
    $first = 0;
    $second = 1;

    echo "Fibonacci Series ($numTerms terms): ";
    for ($i = 0; $i < $numTerms; $i++) {
        echo $first . " ";
        $next = $first + $second;
        $first = $second;
        $second = $next;
    }
    echo "<br>";
}

// Call the functions with desired parameters
generatePrimes(50);      // Generate prime numbers up to 50
fibonacciSeries(10);     // Generate 10 terms of the Fibonacci series

?>
