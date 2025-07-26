<?php
require "../db_connect.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST["edit_book_id_modal"];
    $title = $_POST["edit_book_title_modal"];
    $author = $_POST["edit_author_modal"];
    $quantity = $_POST["edit_quantity_modal"];
   
    $SQL_QUERY = "UPDATE `books` SET `title`=?, `author`=?, `quantity`=? WHERE `ID`=?";
    if($stmt = mysqli_prepare($conn, $SQL_QUERY)){
        mysqli_stmt_bind_param($stmt, "ssii", $title, $author, $quantity, $id);
        if(!mysqli_stmt_execute($stmt)){
            echo "Cannot edit this book";
        }
        mysqli_stmt_close($stmt);
    }
    //$conn variable is from db_connect.php
    mysqli_close($conn);
    header(header: 'Location: ../../books.php');

}