<?php
require __DIR__ . "/../db_connect.php";

$SQL_QUERY = "SELECT `title` FROM `books`";
$books_result = mysqli_query($conn, $SQL_QUERY);

if (!$books_result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($books_result) > 0) {
    while ($row = mysqli_fetch_assoc($books_result)) {
        extract($row);
        echo "<option value=\"$title\">$title</option>";
    }
}

//$conn variable is from db_connect.php
mysqli_close($conn);