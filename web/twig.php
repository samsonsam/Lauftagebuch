<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuelerb
 * Date: 08.12.17
 * Time: 12:19
 */

require_once __DIR__ . '/vendor/autoload.php';
include __DIR__.'/src/model.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader);