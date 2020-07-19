<?php

class Node 
{
    public $data;
    public $left;
    public $right;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function add($data)
    {
        if ($data > $this->data) {
            if ($this->right == null) {
                $this->right = new Node($data);
            } else {
                $this->right->add($data);
            }
        } elseif ($data < $this->data) {
            if ($this->left == null) {
                $this->left = new Node($data);
            } else {
                $this->left->add($data);
            }
        }
    }

    public function contains($data)
    {
        if ($this->data == $data) {
            return true;
        }

        if ($data > $this->data) {
            if ($this->right != null) {
                return $this->right->contains($data);
            }
        } else ($data < $this->data) {
            if ($this->left != null) {
                return $this->left->contains($data);
            }
        }

        return false;
    }

    public function traverse() 
    {
        if ($this->left != null) {
            return $this->left->traverse;
        }

        echo $this->data;

        if ($this->right != null) {
            return $this->right->traverse;
        }

        /*
            in order: left, root, right
            pre order: root, left, right
            post order: left, right, root
        */
    }

}

$root = new Node(5); 
$root->add(2);
$root->add(7);
echo $root->contains(3);



?>