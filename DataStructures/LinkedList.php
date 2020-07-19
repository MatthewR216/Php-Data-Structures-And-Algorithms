<?php

/*
    Each item in the linked list is referred to as a Node
    in this implementation, a node is an object made up its data
    and a reference to the next node. Each node's next attribute is the
    next node itself.
*/

class Node 
{   
    public $data;
    public $next;

    public function __construct($data) 
    {
        $this->data = $data;
    }
}

/*
    appending
    prepending 
    appending at nth position 
    deleting at nth position 
    deleting head
*/


class LinkedList
{
    public $head;

    //adds item to the end of the linked list
    public function append($data)
    {
        //check if head is null, mark this new node as the head and return 

        if ($this->head == null) {
            $this->head = new Node($data);
            return;
        }

        //this gets us to the last item of the linked list
        $currentNode = $this->head;
        while ($currentNode->next != null) {
            $currentNode = $currentNode->next; 
        }

        //have last item's next pointer to be the new node
        $currentNode->next = new Node($data);
        return;
    }

    //add item at beginning of linked list
    public function prepend($data)
    {
        //make head node if null
        if ($this->head == null) {
            $this->head = new Node($data);
            return;        
        }

        //make new node, make its next pointer current head then make current head new node 
        $newHead = new Node($data);
        $newHead->next = $this->head;
        $this->head = $newHead;
        
        return;
    }

    //adds item at the nth position
    public function addAtN($data, $n)
    {
        //first item is just head of linked list so just prepend 
        if ($n == 1) {
            $this->prepend($data);
            return;
        } elseif ($n < 1) {
            return 'invalid data';
        }

        //we want to get to the element before the nth position
        $currentNode = $this->head;
        for ($i = 0; $i < n - 1; $i++) {
            $currentNode = $currentNode->next; 
        }

        //swapping the nodes around
        $nextNode = $currentNode->next;
        $nodeToAppend = new Node($data);
        $nodeToAppend = $nextNode;
        $currentNode->next = $nodeToAppend;
    }



}

?>