<?php


    //sort array $array = array zu sortieren                                 compare to
    usort($array, function($a, $b) {return strcmp($a->getZustand()["zustand"], $b->getZustand()["zustand"]);});





?>