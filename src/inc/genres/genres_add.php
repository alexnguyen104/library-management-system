<?php
session_start();

require __DIR__ . "/../db_connect.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $genre = $_POST['add_genre_modal'];

    $SQL_QUERY = "INSERT INTO `genres` (`genres`) VALUES (?)";

    if($stmt = mysqli_prepare($conn, $SQL_QUERY)){
        mysqli_stmt_bind_param($stmt,"s", $genre);

        if(!mysqli_stmt_execute($stmt)){
            echo "Cannot add a new genre";
        }
        mysqli_stmt_close($stmt);
    }
    //$conn variable is from db_connect.php
    mysqli_close($conn);
    
    header('Location: ../../genres.php');
}