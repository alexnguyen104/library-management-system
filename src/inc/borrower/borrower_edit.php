<?php
require "../db_connect.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST["name_modal"];
    $id = $_POST["id_num_modal"];
    $phone = $_POST["phone_modal"];
    $start_date = $_POST["start_date_modal"];
    $end_date = $_POST["end_date_modal"];

    $SQL_QUERY = "UPDATE `borrowers` SET `name`=?, `phone_num`=?, `start_date`=?, `end_date`=? WHERE `ID`=?";
    if($stmt = mysqli_prepare($conn, $SQL_QUERY)){
        mysqli_stmt_bind_param($stmt, "ssssi", $name, $phone, $start_date, $end_date, $id);
        if(!mysqli_stmt_execute($stmt)){
            echo "Cannot edit this borrower";
        }
        mysqli_stmt_close($stmt);
    }
    //$conn variable is from db_connect.php
    mysqli_close($conn);
    header(header: 'Location: ../../borrowers.php');

}