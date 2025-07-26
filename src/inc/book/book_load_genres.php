<?php
require __DIR__ . "/../db_connect.php";

$SQL_QUERY = "SELECT `genres` FROM `genres`";
$genres_result = mysqli_query($conn, $SQL_QUERY);

if (!$genres_result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($genres_result) > 0) {
    while ($row = mysqli_fetch_assoc($genres_result)) {
        extract($row);
        echo "<option class=\"genre_option\" value=\"$genres\">$genres</option>";
    }
}

//$conn variable is from db_connect.php
mysqli_close($conn);