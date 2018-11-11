<?php
$dbuser = $_ENV['MYSQL_USER'];
$dbpass = $_ENV['MYSQL_PASS'];
try {
    $pdo = new PDO("mysql:host=mysql;dbname=blog", $dbuser, $dbpass);
    $statement = $pdo->prepare("SELECT * FROM posts");
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_OBJ);
    
    echo "<h2>Posts</h2>";
    echo "<table>";
    echo "<tr><td><font color='red'>Titulo</font></td><td><font color='red'>Autor</font></td></tr>";
    foreach ($posts as $post ) {
        echo "<tr>";
        echo "<td>".$post->title."</td> <td>" . $post->autor . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    

} catch(PDOException $e) {
    echo $e->getMessage();
}

