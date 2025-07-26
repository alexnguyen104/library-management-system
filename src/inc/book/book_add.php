<?php
require __DIR__ . "/../db_connect.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = $_POST["add_book_title_modal"];
    $author = $_POST["add_author_modal"];
    $quantity = $_POST["add_quantity_modal"];
    $genres_array = $_POST["add_genres_modal"];

    $genres = implode(";",$genres_array);

    $SQL_QUERY = "INSERT INTO `books` (`title`, `author`, `quantity`, `genres`) VALUES (?,?,?,?)";

    if($stmt = mysqli_prepare($conn, $SQL_QUERY)){
        mysqli_stmt_bind_param($stmt,"ssis", $title, $author, $quantity, $genres);
        if(!mysqli_stmt_execute($stmt)){
            echo "Cannot add a new book";
        }

        mysqli_stmt_close($stmt);

    }
    //$conn variable is from db_connect.php
    mysqli_close($conn);

    header('Location: ../../books.php');
}