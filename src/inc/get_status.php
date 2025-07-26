<?php
function get_status($end_date){
    $e_date = strtotime($end_date);
    $present = strtotime(date("Y-m-d"));
    $status = "";
    if ($e_date > $present) {
        $status = "On Time";
    }else if($e_date < $present){
        $status = "Overdue";
    }else{
        $status = "Due Today";
    }
    return $status;
}