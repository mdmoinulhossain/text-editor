<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Classic editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
</head>

<body>
    <h1>Classic editor</h1>
    <form method="post" action="../save-text.php">
        <textarea name="editor_content" id="editor"></textarea><br>
        <input type="submit" value="Submit">
    </form>
    <?php
    include '../db.php';

    // Retrieve the text from the database
    $sql = "SELECT `content` FROM `text_content` ORDER BY `id` DESC"; // Assuming 'id' is your primary key || `DESC` - descending data && `LIMIT 1` - last one of a data table. 

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {

        // Display the retrieved content
        echo "<hr/><h3>Content from the database:</h3><br/>";
        while ($row = $result->fetch_assoc()) {
            $content = $row['content'];
            echo $content . "<br/>";
        }
    } else {
        echo "No content found in the database";
    }

    $conn->close();
    ?>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>