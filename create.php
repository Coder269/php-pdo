<?php

require 'config.php';
$pdo = new PDO(DNS, USER, PASS);
$errors = [];

if (!empty($_POST))
{
    $title = isset($_POST["title"]) && !empty($_POST["title"]) ? trim($_POST["title"]) : "";
    $author = isset($_POST["author"]) && !empty($_POST["author"]) ? trim($_POST["author"]) : "";
    $content = isset($_POST["content"]) && !empty($_POST["content"]) ? trim($_POST["content"]) : "";

    if (empty($title))
        $errors[] = "Title is required";
    if (strlen($title) > 255)
        $errors[] = "Title is too long";

    if (empty($author))
        $errors[] = "Author is required";
    if (strlen($author) > 100)
        $errors[] = "Author is too long";

    if (empty($content))
        $errors[] = "Content is required";

    if (empty($errors))
    {
        $query = "INSERT INTO story (title, author, content) VALUES ('$title', '$author', '$content')";
        $rowCount = $pdo->exec($query);
        echo "<script>alert('Story created successfully');</script>";
    }

}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Story</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php
include 'header.php';
?>
<main>
    <h1>Create A Story</h1>
    <form action="create.php" method="post">
        <fieldset>
            <legend><h3>Create Story Form</h3></legend>
            <?php
            if (!empty($errors))
                echo "<h3 class='errorTitle'>Please correct the following errors:</h3>";
                foreach ($errors as $error)
                    echo "<h4 class='errorTitle'>$error</h4>";
            ?>
            <label for="title"><strong>Title :</strong></label>
        <input type="text" name="title" id="title" maxlength="255" required>
        <br><br>
        <label for="author"><strong>Author :</strong></label>
        <input type="text" name="author" id="author" maxlength="100" required>
        <br><br>
        <label for="content"><strong>Content :</strong></label>
            <br>
        <textarea name="content" id="content" cols="100" rows="20" required></textarea>
        <br><br>
        <input type="submit" value="Create">
        </fieldset>
    </form>
</main>
</body>
</html>
