<?php

include 'pseudo_linked_list.php';
use App\LinkedList\LinkedList;

$linkedList = new LinkedList();
$linkedList->addFirst('1');
$linkedList->addAt('2', 1);
$linkedList->addAt('3', 2);
$linkedList->addAt('4', 3);
$linkedList->addAt('5', 4);

/** Iterative O(n) and O(1)  */
function reverse_linked_list(LinkedList $list): LinkedList{
    $prev = null;
    $current = $list->head;
    while($current !== null){
        $next = $current->next;
        $current->next = $prev;
        $prev = $current;
        $current = $next;
    }
    return new LinkedList($prev);
}

$reversed = reverse_linked_list($linkedList);
echo PHP_EOL;

$reversed->print();
