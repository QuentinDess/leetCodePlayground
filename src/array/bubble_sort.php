<?php
$array = range(1,100);
 shuffle($array);

/** Best Case O(n) Mid O(n^2)  */
 function bubbleSort($array) {
    $n = count($array);
    while($n > 0) {
        for($i = 1; $i < $n; $i++) {
            if($array[$i] < $array[$i - 1]) {
                [$array[$i],$array[$i-1]] =  [$array[$i - 1 ],$array[$i]] ;
            }
        }
        $n --;
    }
    return $array;
}

$sorted = bubbleSort($array);

var_dump(json_encode($sorted));
