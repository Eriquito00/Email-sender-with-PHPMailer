<?php

$subjecte = $email = $missatge = $error = "";

function comprovarDades($subjecte, $email, $missatge , &$error) {
    if (empty($subjecte)) $error .= "El camp subjecte està buit.<br>";
    if (empty($email)) $error .= "El camp email està buit.<br>";
    else if (!preg_match("/^[A-Za-z0-9.-_%+]+@[A-Za-z0-9._]+\.[A-Za-z]+$/", $email)) $error .= "El camp email no és vàlid.<br>";
    if (empty($missatge)) $error .= "El camp missatge està buit.<br>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subjecte = $_POST['subjecte'] ?? "";
    $email = $_POST['email'] ?? "";
    $missatge = $_POST['message'] ?? "";
    $error = "";

    comprovarDades($subjecte, $email, $missatge, $error);

    try {
        if (empty($error)) {
            require './controller/mailer.php';
            if (!enviarCorreu($subjecte, $email, $missatge)) $error = "No s'ha pogut enviar el correu.";
            else{
                $error = "El correu s'ha enviat correctament.<br>";
                require './model/model.php';
                $sender = require './config.php';
                if (insertHistory($sender["SMTP_USER"], $email, $subjecte, $missatge)){
                    $error .= "Historial actualitzat correctament.";
                    //TODO: Crear objeto de tipo mail y guardarlo para poder mostrarlo despues en una tabla
                }
                else $error .= "No s'ha pogut actualitzar l'historial. Error amb la base de dades.";
            }
            $subjecte = $email = $missatge = "";
        }
    }
    catch (Exception $e) {
        $error = $e->getMessage();
    }
}

require_once "./view/view.php";

?>