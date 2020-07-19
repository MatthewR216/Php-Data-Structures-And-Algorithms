<?php

/*
    First in First out each node refers to the node after it with
    its next pointer, last item in the list is marked with tail.
*/

class Node 
{
    public $data;
    public $pointer; 

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class Queue
{
    public $head;
    public $tail;

    //add item to the end of the queue
    public function enQueue($data) 
    {
        $newNode = new Node($data);

        //empty list so make it the back and the front 
        if ($head == null) {            
            $this->head = $newNode;
            $this->tail = $newNode;
            return;
        }

        //otherwise make it the next pointer of current tail and make it the new tail
        $this->tail->pointer = $newNode; 
        $this->tail = $newNode;
        return;
    }

    //remove first item from the queue
    public function deQueue()
    {
        if ($this->head == null) {
            $this->tail = null;
            return 'empty queue';
        }

        //if needed just store in temp var and return it 
        $this->head = $this->head->pointer;
    }
}

?>