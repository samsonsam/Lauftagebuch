<?php
namespace ueb05\web\views;
use function ueb05\web\getRunData;

$doc_root = $_SERVER['DOCUMENT_ROOT'];
require_once("$doc_root/model.php");
$data = getRunData();

$total_activity = 0;
$activity_span = 0;
$total_km = 0;
$total_h = 0;
$start_time = null;
$end_time= null;
$i = 0;
$hh = 0;
$mm = 0;
$ss = 0;
$prev_run = null;

foreach ($data as $elem) {
    global $total_activity, $activity_span, $total_km, $total_h, $start_time, $end_time, $i, $hh, $mm, $ss, $prev_run;

    if ($i == 0) {
        $end_time = $elem["Date"];
    } elseif (count($data) == $i + 1) {
        $start_time =  $elem["Date"];
    }

    if ($prev_run and $prev_run != $elem["Date"]) {
        $total_activity = $i + 1;
    } elseif (!$prev_run) {
        $total_activity = $i + 1;
    }
    $total_km += $elem["Distance"];
    $time = explode(':', $elem["Time"]);
    $hh += $time[0];
    $mm += $time[1];
    $ss += $time[2];
    $i++;
    $prev_run = $elem["Date"];
}

$total_h = round($hh + $mm / 1440 + $ss / 86400, 2, PHP_ROUND_HALF_UP);
$difference_in_seconds = $start_time - $end_time;
$activity_span = $difference_in_seconds / 60 / 60 / 24;

?>
<div class="jumbotron" style="background-image: url('../img/1273687.jpg'); background-position: center right">
    <h2 class="white">Sie sind ...</h2>
    <br>
    <p class="white">an insgesamt <strong><?php echo $total_activity ?></strong> Tagen gelaufen</p>
    <p class="white">im Zeitraum von <strong><?php echo $activity_span ?></strong> Tagen</p>
    <p class="white">Das sind insgesamt <strong><?php echo $total_km ?></strong> Kilometer innerhalb von <strong><?php echo $total_h ?></strong> Stunden</p>
</div>