<?php
include './db.php';


// Check if there's already a row in the table
$result = $conn->query("SELECT COUNT(*) AS total FROM `text_content`");
if ($result) {
    $row = $result->fetch_assoc();
    if ($row['total'] > 0) {
        echo "One row added in the database. You cannot add another one.";
        exit(); // Stop further execution
    }
}


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
