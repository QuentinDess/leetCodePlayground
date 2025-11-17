<?php
$array = range(1,100);
 shuffle($array);

/** O(n^2)  */
 function selectionSort($array) {
    for($i = 0; $i < sizeof($array) -1 ; $i++) {
         $minIndex = $i;
        for($j = $i + 1; $j < sizeof($array); $j++) {
            if($array[$j] < $array[$minIndex]) {
                $minIndex = $j;
            }
        }

        if($i !== $minIndex) {
            $temp = $array[$i];
            $array[$i] = $array[$minIndex];
            $array[$minIndex] = $temp;
        }
    }
return $array;
}

$sorted = selectionSort($array);

var_dump(json_encode($sorted));
