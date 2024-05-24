<?php

if (!function_exists('check_RecordMorPor')) {
    function check_RecordMorPor($ResultTerm1, $ResultTerm2) {
        $results = 'ผ';
        if($ResultTerm1 == 'มผ' || $ResultTerm2 == 'ผม'){
            $results = 'มผ';
        }
        return $results;
    }
}

if (!function_exists('loopDate')) {
    function loopDate() {
        $year = date("Y")+543;
        for ($i = -10; $i <= 1; $i++) {
            $newYear[] = $year + $i;
        }
        rsort($newYear);
        $arrlength = count($newYear);
        for ($x = 0; $x < $arrlength; $x++) {
            $sortYear[] = $newYear[$x];
        }
        return $sortYear;
    }
}

if (!function_exists('loopRoom')) {
    function loopRoom() {
        $room = 12;
        $data = array();
        for ($i = 1; $i <= $room; $i++) {
            $data[] = $i;
        }
        return $data;
    }
}

if (!function_exists('loopRetire')) {
    function loopRetire() {
        $year = date("Y")+543;
        for ($i = -1; $i <= 3; $i++) {
            $newYear[] = $year + $i;
        }
        rsort($newYear);
        $arrlength = count($newYear);
        for ($x = 0; $x < $arrlength; $x++) {
            $sortYear[] = $newYear[$x];
        }
        return $sortYear;
    }
}

if (!function_exists('loopYear')) {
    function loopYear() {
        $year = date("Y")+543;
        for ($i = -3; $i <= 1; $i++) {
            $newYear[] = $year + $i;
        }
        rsort($newYear);
        $arrlength = count($newYear);
        for ($x = 0; $x < $arrlength; $x++) {
            $sortYear[] = $newYear[$x];
        }
        return $sortYear;
    }
}

?>