<?php
$dbuser = $_ENV['MYSQL_USER'];
$dbpass = $_ENV['MYSQL_PASS'];
try {
    $pdo = new PDO("mysql:host=mysql;dbname=blog", $dbuser, $dbpass);
    $statement = $pdo->prepare("SELECT * FROM posts");
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_OBJ);
    
    echo "<h2>Posts</h2>";
    echo "<ul>";
    foreach ($posts as $post ) {
        echo "<li>".$post->title."</li>";
    }
    echo "</ul>";
    
    $statement2 = $pdo->prepare("SELECT * FROM posts where id=3");
    $statement2->execute();
    $ultimos = $statement2->fetchAll(PDO::FETCH_OBJ);
    
    echo "<h2>Ultimo Post</h2>";
    echo "<ul>";
    foreach ($ultimos as $post ) {
        echo "<li><b>Ultimo</b>".$post->title."</li>";
    }
    echo "</ul>";

} catch(PDOException $e) {
    echo $e->getMessage();
}

