<?php
/*
    Quicksort implementation
*/

/*
    This is the function that gets the pivot index 
    and recursively calls quicksort on the left and 
    the right halves until the sub array it is trying 
    to quicksort is of length 1. Pass the array by reference
    so we dont globally store it.
*/
function quickSort(&$arr, $left, $right)
{
    /* 
        Base case explained - this if statement will 
        only pass if the length of the given array is more than 1.
        if the left and right pointers are equal then that means
        the length of the sub array is equal to 1, technically, it is 
        already sorted. Recursion doesn't stop if the array is already sorted.         
    */
    if ($left < $right) {

        /*
            The pivot index marks the starting point for all elements bigger than the pivot chosen
        */
        $pivotIndex = partition($arr, $left, $right);

        /*
            call recursively on everything to the right of the pivot index and everything to the left of the pivot index.
            It is -1 for the left sub array because the returned pivot index is one more than the pivot value itself          
        */
        quickSort($arr, $left, $pivotIndex - 1);
        quickSort($arr, $pivotIndex, $right);
    }
}

function partition(&$arr, $left, $right)
{
    /*
        chose a pivot value, for simplicity, I use the first element.
        this is simply just a number to compare the whole of the array to including 
        the value chosen itself. We dont take the pivot value out and arrange the 
        whole array around it, the pivot value is just a number.
    */
    $pivotValue = $arr[$left];

    /*
        initialise left and right pointers, they will walk through the array
        swapping numbers until they cross over, when they cross over, we know 
        that they have swapped everything 
   */
    while ($left <= $right) {
        
        //increment the left pointer until you find a value thats out of place (bigger than the pivot value)
        while ($arr[$left] < $pivotValue) {
            $left += 1;
        } 

        //decrement the right pointer until you find a value thats out of place (smaller than the pivot value)
        while ($arr[$right] > $pivotValue) {
            $right -= 1;
        }

        //Do the swap and increment and decrement the left and right pointers 
        if ($left <= $right) {
            $temp = $arr[$left];
            $arr[$left] = $arr[$right];
            $arr[$right] = $temp;

            $left += 1;
            $right -= 1;
        }
    }    

    //This is the point where everything smaller than the pivot
    return $left;
}

$array = [1, 2, 3, 4, 10, 7];

quickSort($array, 0,count($array) -1);
foreach($array as $value) {
echo $value . "\r\n";
}

