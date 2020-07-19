<?php

/*
    Merge sort implementation
*/

/*
    This is a recursive function to break an array 
    into sub arrays of 1 and then rebuilds using the merge
    function
*/
function mergeSort($arr)
{
    //base case
    if (count($arr) == 1) {
        return $arr;
    }

    // find mid point to break it up
    $mid = floor(count($arr) / 2); 
    

    //slice the array from start to midpoint then from midpoint to end to get left and right halves
    $leftHalf = array_slice($arr, 0, $mid);
    $rightHalf = array_slice($arr, $mid, count($arr)); 

    //call mergeSort on the left and the right halves, this will recursively break down the array
    $leftHalf = mergeSort($leftHalf);
    $rightHalf = mergeSort($rightHalf);

    //then call merge on left and right halves
    return merge($leftHalf, $rightHalf);
}

/*
    This is the function that takes 2 arrays and compares 
    them both and puts the smallest elements into the temp array
    first and then the rest of the other array when one array is empty
    it returns the temp array.
*/
function merge($left, $right)
{
    //declares temp array to be returned
    $mergedList = array();

    //while one of the lists is not empty compare the arrays.
    while (count($left) != 0 && count($right) != 0) {
        /*
            if the first element of the left array is smaller than the first element
            of the right array, add the first element of the left array to the temp array
            and then remove the first element so that on the next iteration, the first element
            will be the next element to be compared 
        */
        if ($left[0] < $right[0]) {
            $mergedList[] = $left[0];
            $left = array_slice($left, 1);

        /*
            vice versa explanation for the below case
        */
        } else {
            $mergedList[] = $right[0];
            $right = array_slice($right, 1);
        }
    }

    /*
        Only one of these functions will ever trigger, their role
        is to empty out the non empty array into the temp array made
    */
    
    while (count($left) != 0) {
        $mergedList[] = $left[0];
        $left = array_slice($left, 1);
    }

    while (count($right) != 0) {
        $mergedList[] = $right[0];
        $right = array_slice($right, 1);
    }   

    //finally return it up 
    return $mergedList;
}   


$sortedArr = mergeSort([2,1,3,5,4,8,2,7]);

foreach($sortedArr as $elem) {
    print_r($elem . ',');
}

?> 