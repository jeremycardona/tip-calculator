<?php 

$sub_total = !empty($_POST['subtotal']) ? $_POST['subtotal'] : '0' ;
$tip_percentage = !empty($_POST['tip-percentage']) ? $_POST['tip-percentage'] : '0';
$people = !empty($_POST['people']) ? $_POST['people'] : '1';

$tip = '';
$total = '';
$split_tip = '';
$split_total = '';
if(is_numeric($sub_total) && is_numeric($tip_percentage) && is_numeric($people) ){
    $tip = ($tip_percentage/100) * $sub_total;
    $total = $sub_total + $tip;
    $split_tip = $tip / $people;
    $split_total = $split_tip + ($sub_total/ $people);
}

 ?>