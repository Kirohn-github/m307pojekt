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
    <input name="inputName" type="text">
    <br>
    <br>
    <label for="inputEmail">Email:</label>
    <input name="inputEmail" type="text">
    <br><br>
    <label for="inputTelefon">Telefon:</label>
    <input name="inputTelefon" type="text">
    <br><br>
    <label for="inputMitgliedschaftsStatus">Mitgliedschafts-Status:</label>
    <input name="inputMitgliedschaftsStatus" type="text">
    <br><br>
    <label for="inputAusgeleihtesVideo">Ausgelehnter Film:</label>
    <select name="inputAusgeleihtesVideo">
        <option value=''></option>
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