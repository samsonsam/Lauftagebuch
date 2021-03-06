<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuelerb
 * Date: 06.12.17
 * Time: 20:52
 */

class Run
{
    public $Date;
    public $Distance;
    public $Time;

    function __construct($Date, $Distance, $Time)
    {
        $now = new DateTime();
        if (!isset($Date)) {
            echo '<script language="javascript">';
            echo 'alert("Überprüfen Sie ihr Datum!")';
            echo '</script>';
            throw new UnexpectedValueException('$Date was not set!');
        } elseif (strtotime($Date) == -1) {
            throw new UnexpectedValueException('$Date was formatted wrong!');
        } elseif (strtotime($Date) > $now->getTimestamp()){
            echo '<script language="javascript">';
            echo 'alert("Datum kann nicht in der Zukunft sein!")';
            echo '</script>';
            throw new UnexpectedValueException('$Date was invalid!');
        } else {
            $this->Date = strtotime($Date);
        }


        if (!isset($Distance)) {
            echo '<script language="javascript">';
            echo 'alert("Überprüfen Sie ihre Distanz!")';
            echo '</script>';
            throw new UnexpectedValueException('$Distance was not set!');
        } elseif ($Distance <= 0) {
            echo '<script language="javascript">';
            echo 'alert("Überprüfen Sie ihre Distanz!")';
            echo '</script>';
            throw new UnexpectedValueException('$Distance can not be \'0\'!');
        } else {
            $this->Distance = $Distance;
        }

        if (!isset($Time)) {
            echo '<script language="javascript">';
            echo 'alert("Überprüfen Sie ihre Zeitangabe!")';
            echo '</script>';
            throw new UnexpectedValueException('$Time was not set!');
        } else {
            $temp = count(explode(':', $Time));
            if ($temp > 3 or $temp < 3) {
                echo '<script language="javascript">';
                echo 'alert("Zeit wurde nicht korrekt angegeben!")';
                echo '</script>';
                throw new UnexpectedValueException('$Time was formatted wrong!');
            } elseif ($temp == 3) {
                $temp = explode(':', $Time);
                if (is_numeric($temp[0]) and is_numeric($temp[1]) and is_numeric($temp[2]) and $temp[0] <= 99 and $temp[1] <= 59 and $temp[2] <= 59) {
                    $this->Time = $Time;
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Überprüfen Sie ihre Zeitangabe!")';
                    echo '</script>';
                    throw new UnexpectedValueException('$Time was not numeric!');
                }
            }
        }
    }
}