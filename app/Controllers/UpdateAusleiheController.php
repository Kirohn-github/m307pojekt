<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!(validate_mobile($_POST['inputTelefon']) and validate_email($_POST['inputEmail']))) {
        $ausleihe = new Ausleihe($_GET['id'], $_POST['inputName'], $_POST['inputEmail'], $_POST['inputTelefon'], null, null, $_POST['inputAusgeleihtesVideo'], $_POST['inputErledigt']);
        $ausleihe->update();
    }
    header('Location: uebersicht');
}

function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function validate_mobile($mobile)
{
    return preg_match('/^[0-9]{10}+$/', $mobile);
}
