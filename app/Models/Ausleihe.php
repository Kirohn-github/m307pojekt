<?php

class Ausleihe
{
    public $id;
    public $name;
    public $email;
    public $telefon;
    public $abgabedatum;
    public $mitgliederschaft;
    public $filmname;
    public $erledigt;

    public function __construct($id = null, $name = null, $email = null, $telefon = null, $abgabedatum = null, $mitgliederschaft = null, $filmname = null, $erledigt = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->telefon = $telefon;
        $this->abgabedatum = $abgabedatum;
        $this->mitgliederschaft = $mitgliederschaft;
        $this->filmname = $filmname;
        $this->erledigt = $erledigt;
    }

    public function create()
    {
        $statement = db()->prepare('INSERT INTO `ausleihe` (name, email, telefon, abgabedatum, mitgliederschaft, filmname, erledigt) VALUES(:name, :email, :telefon, :abgabedatum, :mitgliederschaft, :filmname, :erledigt)');
        $statement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
        $statement->bindParam(':telefon', $this->telefon, PDO::PARAM_STR);
        $statement->bindParam(':abgabedatum', $this->abgabedatum, PDO::PARAM_STR);
        $statement->bindParam(':mitgliederschaft', $this->mitgliederschaft, PDO::PARAM_STR);
        $statement->bindParam(':filmname', $this->filmname, PDO::PARAM_STR);
        $statement->bindParam(':erledigt', $this->erledigt, PDO::PARAM_INT);

        return $statement->execute();
    }

    public static function getAll()
    {
        $statement = db()->prepare('SELECT * FROM ausleihe');
        $statement->execute();

        $result = $statement->fetchAll();
        $ausleihe = [];
        foreach($result as $r){
          $ausleihe[] = Ausleihe::dbResultToAusleihe($r);
        }
        return $ausleihe; 
    }

    private static function dbResultToAusleihe($r)
    {
        return new Ausleihe($r['id'], $r['name'], $r['email'], $r['telefon'], $r['abgabedatum'], $r['mitgliederschaft'], $r['filmname'], $r['erledigt']);
    }

    public static function getByID($id)
    {
        $statement = db()->prepare('SELECT * FROM ausleihe WHERE id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return Ausleihe::dbResultToAusleihe($statement->fetch());
    }

    public function update()
    {
        $statement = db()->prepare('UPDATE ausleihe SET name = :name, email = :email, telefon = :telefon, filmname = :filmname, erledigt = :erledigt WHERE id = :id');
        $statement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
        $statement->bindParam(':telefon', $this->telefon, PDO::PARAM_STR);
        $statement->bindParam(':filmname', $this->filmname, PDO::PARAM_STR);
        $statement->bindParam(':erledigt', $this->erledigt, PDO::PARAM_INT);
        $statement->bindParam(':id', $this->id, PDO::PARAM_INT);

        return $statement->execute();
    }

    public static function delete($id)
    {
        $statement = db()->prepare('DELETE FROM `ausleihe` WHERE id = :id');
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}

?>