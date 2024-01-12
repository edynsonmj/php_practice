<?php
/*
Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

You can return the answer in any order.
*/
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $n = sizeof($nums);
        $i=0;
        $j=0;
        $f=0;
        for($i=0; $i<$n; $i++){
            for($j=$i+1; $j<$n; $j++){
                if(($nums[$i]+$nums[$j])==$target){
                    $f=1;
                    break;
                }
            }
            if($f==1){
                break;
            }
        }
        return[$i,$j];
    }