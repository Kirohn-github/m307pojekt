<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!(validate_mobile($_POST['inputTelefon']) AND validate_email($_POST['inputEmail'])))
    {
        $datum = null;
        if ($_POST['inputMitgliedschaftsStatus'] == 'Gold') {
            $datum = date('Y-m-d', strtotime(date('Y-m-d'). ' + 70 days'));
        }
        elseif ($_POST['inputMitgliedschaftsStatus'] == 'Silber') 
        {
            $datum = date('Y-m-d', strtotime(date('Y-m-d'). ' + 50 days'));
        }
        elseif ($_POST['inputMitgliedschaftsStatus'] == 'Bronze') 
        {
            $datum = date('Y-m-d', strtotime(date('Y-m-d'). ' + 40 days'));
        }
        else
        {
            $datum = date('Y-m-d', strtotime(date('Y-m-d'). ' + 30 days'));
        }
        $ausleihe = new Ausleihe(null, $_POST['inputName'], $_POST['inputEmail'], $_POST['inputTelefon'], $datum, $_POST['inputMitgliedschaftsStatus'], $_POST['inputAusgeleihtesVideo'], 0);
        $ausleihe->create();
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