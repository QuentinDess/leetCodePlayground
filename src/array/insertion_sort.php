<?php
$array = range(1,100);
 shuffle($array);

/** O(n) Mid O(n^2) Worst O(n^2)   */
function insertionSort($array) {

    for($i = 1; $i < count($array); $i++) {
        $temp = $array[$i];
        for($j= $i -1; $j >= 0 && $array[$j] > $temp ; $j--) {
            $array[$j+1] = $array[$j];
        }
        $array[$j+1] = $temp;
    }
return $array;
}

$sorted = insertionSort($array);

var_dump(json_encode($sorted));
