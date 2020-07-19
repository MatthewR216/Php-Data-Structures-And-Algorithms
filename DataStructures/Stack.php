<?php

/*
    First in Last Out 
    Each node will need to have a reference
    to the node before it instead of after it
    so when we pop the stack, we can bring the previous 
    item to the top of the stack. NEXT POINTERS WILL NOT WORK

*/

class Node
{
    public $data;
    public $prev;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class Stack 
{
    public $top; 

    public function push($data)
    {   
        //make top if empty stack
        if ($this->top == null) {
            $this->top = $data;
            return;
        }

        $newTop = new Node($data);
        $newTop->prev = $this->top;
        $this->top = $newTop;
        return;
    }

    //removes item from top of stack and returns data
    public function pop()
    {
        $returnItem = $this->top;
        $this->top = $this->top->prev;

        return $returnItem;
    }

    //returns item at top of stack without popping it of 
    public function peek()
    {
        return $this->top;
    }
}

?>