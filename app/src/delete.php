<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuelerb
 * Date: 10.12.17
 * Time: 19:22
 */

require_once __DIR__ . '/model.php';


if (isset($_POST['job']) and $_POST['job'] == 'delete') {
    \ueb05\web\deleteRunData(intval($_POST['id']));
}