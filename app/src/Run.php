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
        $this->Date = strtotime($Date);
        $this->Distance = $Distance;

        if (count(explode(':', $Time)) == 3) {
            $this->Time = $Time;
        }elseif (count(explode(':', $Time)) == 2) {
            $this->Time = '00:'.$Time;
        }elseif (count(explode(':', $Time)) == 1) {
            $this->Time = '00:00:'.$Time;
        }else {
            throw new UnexpectedValueException('Zeit wurde nicht korrekt angegeben');
        }
    }

    function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        } else {
            return false;
        }
    }

    function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

}