<?php

require 'config.php';
$pdo = new PDO(DNS, USER, PASS);

$query = "SELECT * FROM story";
$statement = $pdo->query($query);
$stories = $statement->fetchAll();

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to our Stories</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include 'header.php';
?>
<main>
    <h1>Welcome to our Stories</h1>
    <h2>List of Stories</h2>
    <?php
    foreach ($stories as $story)
    {
        echo "<section>";
        echo "<h2>{$story['title']}</h2>";
        echo "<h4>By: {$story['author']}</h4>";
        echo "<article>{$story['content']}</article>";
        echo "</section>";

    }
    ?>
</main>
</body>
</html>
