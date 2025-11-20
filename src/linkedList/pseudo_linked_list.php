<?php
namespace App\LinkedList;
class Node {
     public function __construct(
        public mixed     $value,
        public ?Node     $next = null,
     )
     {
     }
}

class LinkedList
{
    public function __construct(
        public ?Node $head = null,
        public int   $size = 0,
    ) {}

    public function addFirst(mixed $value): void
    {
        $current = $this->head;
        $this->size++;
        if($current == null) {
            $this->head = new Node($value);
            return;
        }
        $this->head = new Node($value, $current);
    }

    public function addLast(mixed $value): void
    {
        $current = $this->head;
        $this->size++;
        if($current == null) {
            $this->head = new Node($value);
            return;
        }
        while($current->next !== null) {
            $current = $current->next;
        }
        $current->next = new Node($value);
    }

    public function addAt(mixed $value, int $position): void
    {
        if($position > $this->size || $position < 0) {
            throw new LogicException('Position is out of range');
        }
        if($position === 0) {
            $this->addFirst($value);
            return;
        }
        $current = $this->head;
        for ($steps = $position - 1; $steps > 0; $steps--) {
            $current = $current->next;
        }

        $next = $current->next;
        $current->next = new Node($value, $next);
        $this->size++;
    }

    public function print(): void
    {
        $current = $this->head;
        while($current !== null) {
            echo "$current->value" .'->';
            $current = $current->next;
        }
    }

    public function removeFirst(): void
    {
        if($this->head === null) {
            return;
        }
        $this->head = $this->head->next;
        $this->size--;
    }

    public function removeLast(): void
    {
        if (!$this->head) {
            return;
        }

        $node = $this->head;

        if (!$node->next) {
            $this->head = null;
        } else {
            while ($node->next->next) {
                $node = $node->next;
            }
            $node->next = null;
        }

        $this->size--;
    }

    public function removeAt(int $position): void
    {
        if($position >= $this->size || $position < 0) {
            throw new LogicException('Position is out of range');
        }
        if($position === 0) {
            $this->removeFirst();
            return;
        }
        $current = $this->head;
        for ($steps = $position - 1; $steps > 0; $steps--) {
            $current = $current->next;
        }

        $current->next = $current->next?->next;
        $this->size--;

    }

    public function getNodeAt(int $position): mixed
    {
        if($position > $this->size -1 || $position < 0) {
           return null;
        }

        $current = $this->head;
        for ($i = 0; $i < $position; $i++){
            $current = $current->next;
        }
        return $current->value;
    }

    public function contains(mixed $value): bool
    {
        $current = $this->head;
        while ($current !== null) {
            if($current->value === $value) {
                return true;
            }
            $current = $current->next;
        }
        return false;
    }
}
/*
$linkedList = new LinkedList();
$linkedList->addFirst("a");
$linkedList->print();
echo PHP_EOL;
$linkedList->addFirst("b");
$linkedList->print();
$linkedList->addLast('d');
$linkedList->addLast('e');
echo PHP_EOL;
$linkedList->addAt('c', 3);
$linkedList->addAt('x', 5);
$linkedList->removeFirst();
$linkedList->removeLast();
$linkedList->print();
echo PHP_EOL;

echo $linkedList->getNodeAt(3);
echo PHP_EOL;

echo $linkedList->contains('z') ? 'true' : 'false';
echo PHP_EOL;
echo $linkedList->contains('a') ? 'true' : 'false';*/
