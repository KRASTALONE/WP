<!--Write a PHP program to remove duplicates from a sorted list.-->

<?php
// Function to remove duplicates from an array
function removeDuplicates($array) {
    $result = array_values(array_unique($array));
    return $result;
}

// Example sorted list
$sortedlist = [1, 1, 2, 2, 3, 1, 4, 5];

// Remove duplicates
$uniqueList = removeDuplicates($sortedlist);

// Print original list
echo "Original list: ";
print_r($sortedlist);

// Print unique list
echo "<br>Unique list: ";
print_r($uniqueList);
?>
