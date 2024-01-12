<?php
/*
ejercicio 88: unir 2 arreglos
//solucion 1.
You are given two integer arrays nums1 and nums2, sorted in non-decreasing order, and two integers m and n, 
representing the number of elements in nums1 and nums2 respectively.

Merge nums1 and nums2 into a single array sorted in non-decreasing order.

The final sorted array should not be returned by the function, but instead be stored inside the array nums1. 
To accommodate this, nums1 has a length of m + n, where the first m elements denote the elements that should be merged, 
and the last n elements are set to 0 and should be ignored. nums2 has a length of n. 
*/

/*
    observaciones: se debe tener en cuenta que para PHP 0 equivale a null.
*/

//caso1

$nums1 = [1,2,3,0,0,0];
$nums2 = [2,5,6];

//caso2
/*
$nums1 = [1];
$nums2 = [];
*/
//caso3
/*
$nums1 = [0];
$nums2 = [1];
*/
merge($nums1, $nums2);
echo("solucion: ");
print_r($nums1);

function merge (&$nums1, $nums2){
    //limpiando array
    outcero($nums1);
    outcero($nums2);

    $resultado=[];
    $n1=sizeof($nums1);
    $n2=sizeof($nums2);
    $cont1 = 0;
    $cont2 = 0;
    $a=0;
    $b=0;

    while(true){
        if($cont1 < $n1){
            $a = $nums1[$cont1];
        }
        if($cont2 < $n2){
            $b = $nums2[$cont2];
        }
        if($cont1 < $n1){
            if($a<=$b || $cont2>=$n2){
                array_push($resultado, $a);
                $cont1++;
            }
        }
        if($cont2 < $n2){
            if($b<$a || $cont1>=$n1){
                array_push($resultado, $b);
                $cont2++;
            }
        }
        if($cont1>=$n1 && $cont2>=$n2){
            break;
        }
    }
    $nums1=$resultado;
}

/**
 * Funcion recursiva que elimina ceros a la derecha en un array
 */
function outcero (&$nums){
    $size = sizeof($nums);
    if($size<=0){
        return;
    }
    if($nums[$size-1]!=0){
        return;
    }
    unset($nums[$size-1]);
    outcero($nums);
}