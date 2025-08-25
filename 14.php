<!--Write a Program to store and read image from Database.-->

CREATE DATABASE myDB;
USE myDB;

CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_name VARCHAR(255),
    image_type VARCHAR(50),
    image_data LONGBLOB
);





<?php
$conn = new mysqli("localhost", "root", "", "myDB"); // update credentials if needed
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Display image if ?id= parameter is set
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT image_type, image_data FROM images WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imageType, $imageData);
    $stmt->fetch();
    header("Content-type: $imageType");
    echo $imageData;
    exit;
}

// Handle image upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $imgData = file_get_contents($_FILES["image"]["tmp_name"]);
    $imgName = $_FILES["image"]["name"];
    $imgType = $_FILES["image"]["type"];
    $stmt = $conn->prepare("INSERT INTO images(image_name, image_type, image_data) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $imgName, $imgType, $imgData);
    $stmt->execute();
}

// Function to display uploaded images
function displayImages($conn) {
    $sql = "SELECT id, image_name FROM images";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo '<img src="?id='.$row["id"].'" alt="'.$row["image_name"].'" /><br>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload and Display</title>
</head>
<body>
    <h1>Upload and Display Images</h1>
    <form method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image" id="image">
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <h2>Uploaded Images:</h2>
    <?php displayImages($conn); ?>
    <?php $conn->close(); ?>
</body>
</html>
