<?php

namespace ueb05\web;

require_once(__DIR__ . '/twig.php');

echo $twig->render('welcome.twig', array(
    'pagetitle' => 'Startseite'
));