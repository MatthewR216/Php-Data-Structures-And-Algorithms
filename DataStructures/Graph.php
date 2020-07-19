<?php
//Queue implementation to use in the breadth first search

class Node 
{
    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class Queue
{
    public $front;
    public $tail;

    public function enQueue($data)
    {
        $nodeToAdd = new Node($data);

        if ($this->front == null) {
            $this->front = $nodeToAdd;
            $this->tail = $nodeToAdd;
        } else {
            $this->tail->next = $nodeToAdd;
            $this->tail = $nodeToAdd;
        }
    }

    public function deQueue()
    {
        if ($this->front == null) {
            $this->tail = null;
            return 'empty queue';
        } else {
            $this->front = $this->front->next;
        }
       
    }

}


//adjacency list representation of an unweighted graph
class Graph 
{
    public $adjList;
    public $visited = array();

    public function __construct($adjList)
    {   
        $this->adjList = $adjList;
    }

    /*
        performing a depth first search from any node of a bi-directional graph 
    */
    public function printDfs($start)
    {
        //check if it has already been visited
        if (array_key_exists($start, $this->visited)) {
            return;
        }

        //print it out
        echo $start . '<br>';

        //add it to the visited array
        $this->visited[$start] = true;        

        //foreach one of it's connected vertices, call printDfs 
        for($i = 0; $i < count($this->adjList[$start]); $i ++) {
            $this->printDfs($this->adjList[$start][$i]);
        }
    }

    //breadth first search from the 'starting' node of a graph
    public function printBfs($data)
    {        
        $queue = new Queue();        
        $queue->enQueue($data);

        while ($queue->front != null) {
            foreach($this->adjList[$queue->front->data] as $child) {
                //if the children haven't been visited, enqueue them to be printed
                if (!array_key_exists($child, $this->visited)) {  
                    $queue->enQueue($child);
                }                             
            }
            $this->visited[$queue->front->data] = true;
            echo $queue->front->data . '<br>';
            $queue->deQueue();
        }
        
    }
}

$adjList = [
    2 => [7,5],
    7 => [6,2],
    5 => [9,2],
    6 => [8,11,7],
    9 => [4,5],
    8 => [6],
    11 => [6],
    4 => [9]
];

$testGraph = new Graph($adjList);
$testGraph->printBfs(2);

?>