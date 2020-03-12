<?php

$statement = db()->prepare('SELECT title FROM movies');
$statement->execute();

$result = $statement->fetchAll();
echo "<table class='center' border='1' margin-left:'auto' margin-right:'auto'>";
echo "<tr><th>Filmname</th></tr>";
foreach ($result as $movie)
{
    echo "<tr><td>" . $movie["title"] . "</td></tr>";
}
echo "</table>";
?>