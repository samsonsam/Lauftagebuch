<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuelerb
 * Date: 10.12.17
 * Time: 21:50
 */

namespace ueb05\web;

require_once(__DIR__ . '/twig.php');

echo $twig->render('404.php.twig', array(
    'pagetitle' => 'Seite nicht gefunden'
));