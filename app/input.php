<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuelerb
 * Date: 08.12.17
 * Time: 12:41
 */

use function ueb05\web\addRunData;

require_once __DIR__ . '/src/Run.php';

require_once __DIR__ . '/twig.php';
require_once(__DIR__ . '/src/model.php');
if ($_POST) {
    try {
        $data = new Run($_POST["date"], $_POST["distance"], $_POST["time"]);

    } catch (\UnexpectedValueException $exception) {
        //echo "<b style='color: red'>$exception</b>";
    }
    if (isset($data)) {
        addRunData($data);
    }
}

echo $twig->render('input.twig', array(
    'pagetitle' => 'Neuer Eintrag'
));