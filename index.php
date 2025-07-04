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
    <section>
    <h1>Welcome to our Stories</h1>
    </section>
    <section id="stories">
    <?php
    foreach ($stories as $story)
    {
        echo "<article>";
        echo "<h2>{$story['title']}</h2>";
        echo "<h5><em>By: {$story['author']}</em></h5>";
        echo "<p>{$story['content']}</p>";
        echo "</article>";

    }
    ?>
    </section>

</main>
</body>
</html>
