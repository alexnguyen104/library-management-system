<?php
session_start();

require __DIR__ . "/../db_connect.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST["add_name_modal"];
    $id = $_POST["add_id_num_modal"];
    $book_array = $_POST["add_borrowed_books_modal"];
    $phone = $_POST["add_phone_modal"];
    $start_date = $_POST["add_start_date_modal"];
    $end_date = $_POST["add_end_date_modal"];

    // array to string
    $books = implode(";",$book_array);

    //check id
    if(is_duplicate_id($id, $conn)){
        $_SESSION["duplicate_error"] = "Duplicate ID found!";
        header('Location: ../../borrowers.php');
    }
   
    $SQL_QUERY = "INSERT INTO `borrowers` (`ID`, `name`, `phone_num`, `book`, `start_date`, `end_date`) VALUES (?,?,?,?,?,?)";

    if($stmt = mysqli_prepare($conn, $SQL_QUERY)){
        mysqli_stmt_bind_param($stmt,"isssss", $id, $name, $phone, $books, $start_date, $end_date);

        if(!mysqli_stmt_execute($stmt)){
            echo "Cannot add a new borrower";
        }
        mysqli_stmt_close($stmt);
    }
    //$conn variable is from db_connect.php
    mysqli_close($conn);
    
    header('Location: ../../borrowers.php');
}

function is_duplicate_id($id, $conn){
    $SQL_QUERY = "SELECT 1 from `borrowers` WHERE `ID`=?";
    if($stmt = mysqli_prepare($conn, $SQL_QUERY)){
        mysqli_stmt_bind_param($stmt,"i", $id);

        if(!mysqli_stmt_execute($stmt)){
            echo "Cannot check ID";
        }
         // Must store result to get num_rows
        mysqli_stmt_store_result($stmt);
        $num_rows = mysqli_stmt_num_rows($stmt);
        if ($num_rows > 0) {
            return true;
        }

        mysqli_stmt_close($stmt);
    }

}