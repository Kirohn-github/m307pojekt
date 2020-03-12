<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Vidicted Filmausleihe</title>
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
<h2 class="firma">Vidicted</h3>
<h1 class="welcome">Neue Ausleihe</h1>



<form action="createAusleihe" method="post">
    <br>
    <label for="inputName">Name:</label>
    <input name="inputName" type="text" minlength="3" required>
    <br>
    <br>
    <label for="inputEmail">Email:</label>
    <input name="inputEmail" type="email" minlength="7" required>
    <br><br>
    <label for="inputTelefon">Telefon:</label>
    <input name="inputTelefon" type="number">
    <br><br>
    <label for="inputMitgliedschaftsStatus">Mitgliedschafts-Status:</label>
    <select name="inputMitgliedschaftsStatus">
        <option value="Gold">Gold</option>
        <option value="Silber">Silber</option>
        <option value="Bronze">Bronze</option>
        <option value="Kein">Kein</option>
    </select>
    <br><br>
    <label for="inputAusgeleihtesVideo">Ausgelehnter Film:</label>
    <select name="inputAusgeleihtesVideo">
        <?php
            $statement = db()->prepare('SELECT title FROM movies');
            $statement->execute();

            $result = $statement->fetchAll();
            foreach ($result as $movie)
            {  
                echo "<option value='" . $movie["title"] . "'>" . $movie["title"] . "</option>";
            }
        ?>
    </select>
    <br><br>
    <div class="left-btn">        
        <input class="btn" type="submit" value="Speichern"/>
    </div>
    <div class="right-btn">
    <a href="uebersicht"> Cancel </a>
    </div>
    <br>
    <br>
</form>



</body>
</html>