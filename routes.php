<?php

$router = new Router();
$router->define([
    '' => 'app/Controllers/WelcomeController.php',
    'new_borrowing' => 'app/Controllers/NewBorrowingController.php',
    'createAusleihe' => 'app/Controllers/CreateController.php',
    'uebersicht' => 'app/Controllers/UebersichtController.php',
    'bearbeiten' => 'app/Controllers/BearbeitenController.php',
    'bearbeiteAusleihe' => 'app/Controllers/UpdateAusleiheController.php',
]);