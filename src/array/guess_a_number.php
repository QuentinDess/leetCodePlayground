<?php
$numberToGuess = rand(0, 100);
$range = range(1,100);
$numberOfTries = 0;
function simple_search($numberToGuess, $range, $numberOfTries){
    $i = 0;
    while ($numberToGuess >= $range[$i]){
        $numberOfTries++;
        $i++;
    }
    return [$numberToGuess, $numberOfTries];
}

/**
 * O(n) because even with recursion
 * usage of array_splice will create copy element in new array instead of using it
 */
function binary_search_recursion($numberToGuess, $range,& $numberOfTries){
    $half = intval(sizeof($range) / 2);
    if($numberToGuess === $range[$half]){
        return [$numberToGuess, $numberOfTries];
    }

    $splitArray = $numberToGuess >= $range[$half] ? array_splice($range, $half) : array_splice($range, 0, $half);
    $numberOfTries ++;
    return binary_search_recursion($numberToGuess, $splitArray, $numberOfTries);
}

/** O(logN) without using splice and recursion */
function binary_search($numberToGuess, $range,& $numberOfTries){
    $min = 0;
    $max = sizeof($range) -1 ;

    while($min <= $max){
        $numberOfTries++;
        $half = intval(($min + $max )/ 2);
        if($numberToGuess === $range[$half]){
            return [$numberToGuess, $numberOfTries];
        }

        $min = $numberToGuess < $range[$half] ? $min : $half + 1;
        $max = $numberToGuess > $range[$half] ? $max : $half -1 ;
    }
    throw new LogicException('Number is out of range');
}

echo json_encode(binary_search($numberToGuess, $range, $numberOfTries));

