<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuelerb
 * Date: 08.12.17
 * Time: 12:48
 */

use function ueb05\web\getOverviewData;

require_once 'twig.php';


echo $twig->render('overview.php.twig',array(
    'pagetitle' => 'Überblick',
    'data' => getOverviewData()

));