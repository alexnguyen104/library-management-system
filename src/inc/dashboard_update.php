<?php
require_once __DIR__ . "/db_connect.php";
require_once __DIR__ ."/get_status.php";

// for books
function load_books_info($conn) {
    $num_works = 0;
    $num_books = 0;
    $BOOKS_SQL_QUERY = "SELECT `quantity` FROM `books`";
    $books_result = mysqli_query($conn, $BOOKS_SQL_QUERY);

    if($books_result){
        $num_works = mysqli_num_rows($books_result);

        while($row = mysqli_fetch_array($books_result)){
            $num_books += $row["quantity"];
        }
    }
    return [$num_works, $num_books];
}


// for borrowers
function load_borrowers_info($conn) {
    $num_borrowers = 0;
    $num_overdues = 0;
    $OVERDUE_SQL_QUERY = "SELECT `end_date`, `book` FROM `borrowers`";
    $overdue_result = mysqli_query($conn, $OVERDUE_SQL_QUERY);

    if($overdue_result){
        while($row = mysqli_fetch_array($overdue_result)){
            $status = get_status($row["end_date"]);
            $books_num = substr_count($row["book"], ";") + 1;

            if($status == "Overdue"){
                $num_overdues ++;
            }
            $num_borrowers += $books_num;
        }
    }
    return [$num_borrowers, $num_overdues];
}

//$conn variable is from db_connect.php
[$num_works, $num_books] = load_books_info($conn);
[$num_borrowers, $num_overdues] = load_borrowers_info($conn);

mysqli_close($conn);

