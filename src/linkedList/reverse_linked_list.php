<?php

include 'pseudo_linked_list.php';
use App\LinkedList\LinkedList;

$linkedList = new LinkedList();
$linkedList->addFirst('1');
$linkedList->addAt('2', 1);
$linkedList->addAt('3', 2);
$linkedList->addAt('4', 3);
$linkedList->addAt('5', 4);

/** Iterative O(n) time and O(1)  space */
function reverse_linked_list(LinkedList $list): void{
    $prev = null;
    $current = $list->head;
    /** preventive when we have empty linked list or only a head */
    if($current === null || $current->next === null) {
        return;
    }
    while($current !== null){
        $next = $current->next;
        $current->next = $prev;
        $prev = $current;
        $current = $next;
    }
    $list->head = $prev;
}

/** Iterative O(n) time and O(n) space */
function recursive_linked_list_return_new_list(LinkedList $list): LinkedList{
    $current = $list->head;
    /** preventive when we have empty linked list or only a head */
    if($current === null || $current->next === null) {
        return $list;
    }
    $newList = new LinkedList();
    while($current !== null){
        $newList->addFirst($current->value);
        $current = $current->next;
    }
    $list->head = $newList->head;
    return $list;
}

reverse_linked_list($linkedList);
echo PHP_EOL;

$linkedList->print();

echo PHP_EOL;

recursive_linked_list_return_new_list($linkedList);

$linkedList->print();
