<!--Write a PHP Script to print the following pattern on the Screen:
    *****
    ****
    ***
    **
    *                   -->

<?php
// Total number of rows for the pattern
$rows = 5;

for ($i = $rows; $i > 0; $i--) {
    // Printing leading spaces
    for ($j = $rows - $i; $j > 0; $j--) {
        echo "&nbsp;"; // Non-breaking space for HTML output
    }

    // Printing asterisks
    for ($k = 0; $k < $i; $k++) {
        echo "*";
    }
    
    // Move to the next line
    echo "<br>";
}
?>
