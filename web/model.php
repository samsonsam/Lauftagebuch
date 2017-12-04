<?php
namespace ueb05\web;

use UnexpectedValueException;
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$view_folder = "views";

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
        } else {
            throw new UnexpectedValueException('Leck mich im Arsch. Bist du Kacke im Kopf oder Was');
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

function getPage($pagename)
{
    global $view_folder;


    if (file_exists($path = "$view_folder/$pagename.html")) {
        return $path;
    } elseif (file_exists($path = "$view_folder/$pagename.php")) {
        return $path;
    } else {
        return "$view_folder/404.php";
    }
}

function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

function addRunData(Run $data)
{
    global $doc_root;
    $fr = file_get_contents("$doc_root/data.json");
    $arr = json_decode($fr, TRUE);

//    if ($arr) {
//        foreach ($arr as $elem) {
//            global $elem, $data;
//            if (($elem["Date"] == $data["Date"])) {
//                $elem = $data;
//            }
//        }
//    }

    $arr[] = $data;

    // sort array by date
    $arr = array_sort($arr, 'Date', SORT_ASC);


    $json = json_encode($arr);

    $fw = fopen("$doc_root/data.json", 'w');
    fwrite($fw, $json);
    fclose($fw);
    return $arr;
}

function getRunData()
{
    global $doc_root;
    $fr = file_get_contents("$doc_root/data.json");
    $arr = json_decode($fr, TRUE);
    return $arr;
}

?>
