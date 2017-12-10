<?php
namespace ueb05\web;

use Twig_Environment;
use Twig_Loader_Array;

require_once(__DIR__ . '/twig.php');

echo $twig->render('welcome.php.twig', array(
    'pagetitle' => 'Startseite'
));



