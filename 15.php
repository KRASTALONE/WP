<!DOCTYPE html>
<html>
<head>
    <title>File Reader and Writer</title>
</head>
<body>
    <!-- Write text to a file -->
    <form action="FileReadWrite.php" method="post">
        <label for="textdata">Enter Text:</label><br>
        <textarea name="textdata" id="textdata"></textarea><br>
        <input type="submit" value="Write to file"><br>
    </form>
    
    <!-- Read file content by upload -->
    <form action="FileReadWrite.php" method="post" enctype="multipart/form-data">
        <label for="filedata">Upload File to Read File Contents:</label><br>
        <input type="file" name="filedata" id="filedata">
        <input type="submit" value="Read file content"><br>
    </form>
</body>
</html>









<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Write to file
    if (!empty($_POST['textdata'])) {
        file_put_contents('output.txt', $_POST['textdata']);
        echo "Data written to file.<br>";
    }

    // Read file contents
    if (!empty($_FILES['filedata']['tmp_name'])) {
        $filecontent = file_get_contents($_FILES['filedata']['tmp_name']);
        echo "File content: <br>" . htmlspecialchars($filecontent) . "<br>";
    }
}
?>
