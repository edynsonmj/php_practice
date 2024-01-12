<?php
/*
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

merge($nums1,$nums2);
echo("resultado: ");
print_r($nums1);

function merge(&$nums1, $nums2) {
    $resultado = [];
    $n1=sizeof($nums1); //obteniendo tamaños de los arrays
    $n2=sizeof($nums2);
    $a=null;
    $b=null;
    $cont1=0;   //contador array1
    $cont2=0;   //contador array2
    while(true){
        //paso 1: obtener valores o marcar como array finalizado.
        if($cont1 < $n1){
            $a = $nums1[$cont1];
        }else{
            $a='';
        }
        if($cont2 < $n2){
            $b = $nums2[$cont2];
        }else{
            $b='';
        }

        //paso 2: condiciones para viabilidada a insercion: valor menor, array no finalizado, array contrario finalizado.
        if(($a < $b && $cont1<$n1) || ($cont2>=$n2)){
            //si valor es cero se omite y aumenta contador.
            if($a==0){
                $cont1++;
            }else
            if($a!=''){
                array_push($resultado,$a);
                $cont1++;
            }
        }
        if(($b <= $a && $cont2<$n2) || ($cont1>=$n1)){
            if($b==0){
                $cont2++;
            }else
            if($b!=''){
                array_push($resultado,$b);
                $cont2++;
            }
        }
        //paso 3: condicion para cerrar ciclo.
        if($cont1>=$n1 && $cont2>=$n2){
            break;
        }
    }
    $nums1=$resultado;
}