<?php
/*
fuente leetcode ejercicio 88: unir 2 arreglos
//solucion 2.
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

$nums1 = [-2,-1,1,2,3,0,0,0];
$nums2 = [0,0,2,5,6];

//caso2
/*
$nums1 = [1];
$nums2 = [];

//caso3

$nums1 = [0];
$nums2 = [1];
*/
merge($nums1, $nums2);
echo("solucion: ");
print_r($nums1);

function merge (&$nums1, $nums2){
    $resultado=[];
    $n1=sizeof($nums1); //longitud de arrays
    $n2=sizeof($nums2);
    $cont1 = $n1-1;     //contadores para iteracion decreciente
    $cont2 = $n2-1;
    $a=0;               //espacios para evaluacion de valores
    $b=0;
    //banderas para limpiar array
    //0=> array impuro. 1=> array limpio.
    $f1=0;
    $f2=0;

    while(true){
        //obtener elementos
        if($cont1 >= 0){
            $a = $nums1[$cont1];
            //limpiar si poseen ceros al final del array
            if($a==0 && $f1==0){
                $cont1--;
                continue;
            }else{
                $f1=1;
            }
        }
        if($cont2 >= 0){
            $b = $nums2[$cont2];
            if($b==0 && $f2==0){
                $cont2--;
                continue;
            }else{
                $f2=1;
            }
        }
        //si no ha finalizado iteraciones con array, candidato a evaluar
        if($cont1>=0){
            //si es mayor o el array contrario a finalizado iteraciones inserte al inicio.
            if($a>=$b || $cont2<0){
                array_unshift($resultado,$a);
                $cont1--;
            }
        }
        if($cont2>=0){
            if($b>$a || $cont1<0){
                array_unshift($resultado,$b);
                $cont2--;
            }
        }
        //han finalizado iteraciones ambos array?
        if($cont1<0 && $cont2<0){
            break; //rompa ciclo.
        }
    }
    $nums1=$resultado;
}