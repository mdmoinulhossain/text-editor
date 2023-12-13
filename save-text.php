<?php
include './db.php';

// Get text from the editor
$content = $_POST['editor_content'];

// Insert the text into the database (using prepared statement to prevent SQL injection)
$stmt = $conn->prepare("INSERT INTO `text_content`(`content`) VALUES (?)");
$stmt->bind_param("s", $content);

if ($stmt->execute()) {
    echo "Text saved successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
