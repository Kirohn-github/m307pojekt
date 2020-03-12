<?php
function sortFunction( $a, $b ) {
    return strtotime($a["abgabedatum"]) - strtotime($b["abgabedatum"]);
}

$stack = array();

$statement = db()->prepare('SELECT * FROM ausleihe');
$statement->execute();

$result = $statement->fetchAll();
usort($result, "sortFunction");
echo "<table class='center' border='1' margin-left:'auto' margin-right:'auto'>";
echo "<tr><th>Filmname</th><th>Name</th><th>Email</th><th>Telefon</th><th>Abgabedatum</th><th>Ausleihstatus</th><th>Bearbeiten</th></tr>";
foreach ($result as $movie)
{
    if ($movie['erledigt'] == 0)
    {
        echo "<tr><td>" . $movie["filmname"] . "</td><td>" . $movie["name"] . "</td><td>" . $movie["email"] . "</td><td>" . $movie["telefon"] . "</td>";
        array_push($stack, $movie["filmname"]);
        $abgabedatum = null;
        $abgabedatum = $movie['abgabedatum'];
        echo "<td>" . $abgabedatum . "</td>";
        if (date('Y-m-d') < $abgabedatum)
        {
            echo "<td>😁</td>";
        }
        else
        {
            echo "<td>😠</td>";
        }
        echo "<td><a href='bearbeiten?id=" . $movie["id"] . "'>Bearbeiten</a></td>";
        echo "</tr>";
    }
}
echo "</table>";
echo "<br><br>"
?>