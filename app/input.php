<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuelerb
 * Date: 08.12.17
 * Time: 12:41
 */

use function ueb05\web\addRunData;
require_once __DIR__.'/src/Run.php';

require_once __DIR__.'/twig.php';
require_once(__DIR__.'/src/model.php');
if ($_POST) {
    try {
        $data = new Run($_POST["date"], $_POST["distance"], $_POST["time"]);
        addRunData($data);
    } catch (\UnexpectedValueException $exception) {
        //echo $exception;
        echo "<b style='color: red'>Leck mich im Arsch. Bist du Kacke im Kopf oder was?</b>";
    }
}

echo $twig->render('input.php.twig', array(
    'pagetitle' => 'Neuer Eintrag'
));