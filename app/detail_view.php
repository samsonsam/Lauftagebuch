<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuelerb
 * Date: 08.12.17
 * Time: 12:04
 */


use function ueb05\web\getDetailData;

require_once(__DIR__ . '/twig.php');


echo $twig->render('detail_view.twig', array(
    'pagetitle' => 'Detailansicht',
    'runs' => getDetailData()
));