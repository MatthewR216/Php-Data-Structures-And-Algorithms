<?php 

function bubbleSort($arr) 
{   
    do {
        $swap = false;
        for ($i = 0; $i < count($arr);  $i++) {
            for ($j = $i + 1; $j < count($arr); $j++) {
                if ($arr[$i] > $arr[$j]) {
                    //swap 
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$i];
                    $arr[$i] = $temp; 
                    $swap = true;
                }
            }
        }
    } while ($swap = false);

    return $arr;
    
    
}

$sortedArr = bubbleSort([3,1,2,8,4,5]);

foreach($sortedArr as $elem){
    echo $elem . ',';
}
?>