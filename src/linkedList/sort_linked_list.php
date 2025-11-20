<?php

include 'pseudo_linked_list.php';
use App\LinkedList\LinkedList;
use App\LinkedList\Node;

function insertionSort(LinkedList $linkedList) {
    $current = $linkedList->head;
    $sortedLinkedList = new LinkedList();
    while ($current !== null) {
        if($sortedLinkedList->head === null || $current->value < $sortedLinkedList->head->value) {
            $sortedLinkedList->head = new Node($current->value,$sortedLinkedList->head);
        }else{
            $sortedLinkedListCurrent = $sortedLinkedList->head;
            while($sortedLinkedListCurrent->next !== null && $current->value > $sortedLinkedListCurrent->next->value  ) {
                $sortedLinkedListCurrent = $sortedLinkedListCurrent->next;
            }
            $sortedLinkedListCurrent->next = new Node($current->value, $sortedLinkedListCurrent->next);
        }

        $current = $current->next;
    }
    $linkedList->head =  $sortedLinkedList->head;
}

$linkedList = new LinkedList();
$linkedList->addFirst(1);
$linkedList->addFirst(54);
$linkedList->addFirst(43);
$linkedList->addFirst(21);
$linkedList->addFirst(89);
$linkedList->print();

echo PHP_EOL;
insertionSort($linkedList);
$linkedList->print();
