<?php

class PseudoArray {
    public function __construct() {
        $this->value = new SplFixedArray(0);
    }
    public SplFixedArray $value;

    public function addItemAtBeginning($item) {
        $newArray = new SplFixedArray(sizeof($this->value) + 1);
        $newArray[0] = $item;
        for($i = 0; $i < sizeof($this->value); $i++) {
           $newArray[$i + 1] = $this->value[$i];
        }
        $this->value = $newArray;
    }

    /* O(n) time & O(n) memory  */
    public function addItemAtEnd($item) {
        $newArray = new SplFixedArray(sizeof($this->value) + 1);
        $i = 0;
        while($i < sizeof($this->value)) {
            $newArray[$i] =$this->value[$i];
            $i++;
        }
        $newArray[$i] = $item;
        $this->value = $newArray;
    }

    public function addItemAtPosition($item, $position) {
        if($position < 0 || $position > sizeof($this->value)) {
            throw new LogicException('Position is out of range');
        }

        $newArray = new SplFixedArray(sizeof($this->value) + 1);

        for($i = 0; $i < sizeof($this->value) + 1; $i++) {
            if($i === $position) {
                $newArray[$i] = $item;
            }
            elseif($i < $position) {
                $newArray[$i] = $this->value[$i];
            }
            else{
                $newArray[$i] = $this->value[$i -1];
            }
        }
       $this->value = $newArray;
    }

    public function removeItemAtBeginning() {
        if(sizeof($this->value) === 0 ) {
            return;
        }
        $newArray = new SplFixedArray(sizeof($this->value) - 1);
        for($i = 1; $i < sizeof($this->value); $i++) {
            $newArray[$i - 1] = $this->value[$i];
        }
        $this->value = $newArray;
    }

    public function removeItemAtEnd() {
        if(sizeof($this->value) === 0 ) {
            return;
        }
        $newArray = new SplFixedArray(sizeof($this->value) - 1);
        for($i = 0; $i < sizeof($this->value) -1; $i++) {
            $newArray[$i] = $this->value[$i];
        }
        $this->value = $newArray;
    }

    public function removeItemAtPosition($position) {
        if($position < 0 || $position > sizeof($this->value)) {
            throw new LogicException('Position is out of range');
        }
        if(sizeof($this->value) === 0 ) {
            return;
        }
        $newArray = new SplFixedArray(sizeof($this->value) - 1);
        for($i = 0; $i < sizeof($this->value) -1; $i++) {
            if($i < $position) {
                $newArray[$i] = $this->value[$i];
            }else {
                $newArray[$i] = $this->value[$i + 1];
            }
        }
        $this->value = $newArray;
    }
}

$array = new PseudoArray();
$array->addItemAtBeginning('a');
$array->addItemAtEnd('b');
$array->addItemAtPosition('c',1);
$array->addItemAtBeginning('d');
$array->addItemAtEnd('e');
$array->addItemAtPosition('f',2);
$array->removeItemAtBeginning();
$array->removeItemAtEnd();
$array->removeItemAtPosition(1);
var_dump($array->value);
