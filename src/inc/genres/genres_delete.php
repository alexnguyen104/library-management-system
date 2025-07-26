<?php
require_once __DIR__ . "/../db_connect.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['delete_genre_id_modal'];  
    $SQL_QUERY = "DELETE FROM `genres` WHERE `ID`=?";

    if($stmt = mysqli_prepare($conn, $SQL_QUERY)){
        mysqli_stmt_bind_param($stmt,"i", $id);
        if(!mysqli_stmt_execute($stmt)){
            echo "Cannot delete this genre";
        }

        mysqli_stmt_close($stmt);
    }
    //$conn variable is from db_connect.php
    mysqli_close($conn);
    header(header: 'Location: ../../genres.php');
}