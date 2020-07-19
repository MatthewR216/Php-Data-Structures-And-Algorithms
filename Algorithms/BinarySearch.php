<?php

/*
    The list must be sorted before we are able to perform a 
    binary search on it.
*/

function binarySearch($start, $end, $arr, $search)
{   
    /*
        This is the base case when the search term has not been found,
        when start is more than end, the search space has been exhausted
        as it is trying to search an invalid array, where the start index
        is greater than the last index.
    */
    if ($start > $end) {
        return -1;
    }

    //get the midpoint, cast as int.  
    $mid = ($start + $end) / 2; 
    $mid = (int) $mid; 

    /*
        This is the base case when the element is found,
        will return the position
    */
    if ($arr[$mid] == $search) {
        return $mid; 
    } elseif ($arr[$mid] < $search) {
        /*
            binary search right hand side of the sub array, 
            as the element we are looking for is greater

            non inclusive of the element we just looked at hence the '+ 1' 
        */
        return binarySearch($mid + 1, $end, $arr, $search);
    } else {
        /*
            binary search left hand side of the sub array, 
            as the element we are looking for is smaller

            non inclusive of the element we just looked at hence the '- 1' 
        */
        return binarySearch($start, $mid - 1, $arr, $search);
    }
    

}


$searchArr = [1,3,5,7,8,9,10,11];
$searchVal = 6;
var_dump(binarySearch(0, count($searchArr) - 1, $searchArr, $searchVal));


?>