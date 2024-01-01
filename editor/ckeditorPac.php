<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Version 4</title>
    <script src="../ckeditor/ckeditor.js"></script>
</head>

<body>
    <form method="post">
        <textarea name="ckeditor" id="ckeditor"></textarea>
        <input type="submit" value="Submit">
    </form>

    <script>
        CKEDITOR.replace('ckeditor');
    </script>
</body>

</html>