<!--Write a program in PHP for exception handling for 
    i) divide by zero ii) checking date format.-->

<?php
// Exception handling for division by zero
function divide($numerator, $denominator) {
    if ($denominator == 0) {
        throw new Exception("Cannot divide by zero.");
    }
    return $numerator / $denominator;
}

// Exception handling for checking date format
function checkDateFormat($date, $format = 'Y-m-d') {
    $dateTime = DateTime::createFromFormat($format, $date);
    if ($dateTime === false || $dateTime->format($format) !== $date) {
        throw new Exception("Invalid date format.");
    }
    echo "The date - " . $date . " is valid.<br>";
    return true;
}

// Testing Division
try {
    echo divide(10, 2) . "<br>"; // Should work
    echo divide(10, 0) . "<br>"; // Should throw exception
} catch (Exception $e) {
    echo "Division error: " . $e->getMessage() . "<br>";
}

// Testing Date format
try {
    checkDateFormat("2023-03-10", "Y-m-d"); // Should work and confirm validity
    checkDateFormat("10/03/2023", "Y-m-d"); // Should throw exception
} catch (Exception $e) {
    echo "Date error: " . $e->getMessage() . "<br>";
}
?>
