<?php
namespace ueb05\web\views;

use function ueb05\web\getRunData;

$doc_root = $_SERVER['DOCUMENT_ROOT'];
require_once("$doc_root/model.php");

$arr = getRunData();
function toHour($time)
{
    $temp = explode(':', $time);
    return $temp[0] + $temp[1] / 60 + $temp[2] / 3600;
} ?>
<html>
<div class="col-sm-8">
    <h2>Detailansicht</h2>
    <br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Datum</th>
            <th scope="col">Strecke</th>
            <th scope="col">Zeit</th>
            <th scope="col">Ø-Speed</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        if ($arr) {
            foreach ($arr as $elem) {
                $date = date("d.m.Y", $elem["Date"]);
                $dist = $elem["Distance"];
                $time = $elem["Time"];
                $average = intval($elem["Distance"] / toHour($elem["Time"]));
                $index = $i++;
                echo "<tr>";
                echo "<th scope='row'>$index </th>";
                echo "<td>$date </td>";
                echo "<td>$dist km</td>";
                echo "<td>$time h</td>";
                echo "<td>$average km/h</td>";
                echo "<td><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<p><strong>Keine Daten verfügbar.</strong></p>";
            echo "</tr>";
        }

        ?>

        </tbody>
    </table>
</div>
</html>