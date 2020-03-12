<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Vidicted Filmausleihe</title>
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
<h2 class="firma">Vidicted</h3>
<h1 class="welcome">Übersicht aller Filme</h1>

<?php
    include "public/php/film_uebersicht_Tabelle_maker.php";
?>
<br>
<div class="left-btn">
    <form action="new_borrowing">
        <input class="btn" type="submit" value="Neue Ausleihe" />
    </form>
</div>
<div class="right-btn">
    <form action="uebersicht">
        <input class="btn" type="submit" value="Übersicht aller ausgelehnten Filme" />
    </form>
</div>
<br>
<br>

</body>
</html>
