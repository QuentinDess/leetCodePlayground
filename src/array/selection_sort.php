<?php
$array = range(1,100);
 shuffle($array);

/** O(n^2)  */
 function selectionSort($array) {
     $n = count($array);
    for($i = 0; $i < $n -1 ; $i++) {
         $minIndex = $i;
        for($j = $i + 1; $j < $n; $j++) {
            if($array[$j] < $array[$minIndex]) {
                $minIndex = $j;
            }
        }

        if($i !== $minIndex) {
            /** php inline swap */
            [$array[$i], $array[$minIndex]] = [$array[$minIndex], $array[$i]];
        }
    }
return $array;
}

$sorted = selectionSort($array);

var_dump(json_encode($sorted));
