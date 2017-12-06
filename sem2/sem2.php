<?php
/*
function getAdder($operand1) {
    return function ($operand2) use ($operand1) {
            return $operand1 + $operand2;
    };
}

$adder = getAdder(2);
$result = $adder(10);
echo $result;
*/

function concatenation($op1){
    return function ($op2) use ($op1){
        if($op2 == ""){
            return $op1;
        }else{
            return $op1 .= $op2;
        }
    };
}

$con = concatenation("Hello ");
$con = $con("");
echo $con("");
?>