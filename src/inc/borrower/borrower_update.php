<?php
require __DIR__ . "/../db_connect.php";
require_once __DIR__ . "/../get_status.php";

$SQL_QUERY = "SELECT * FROM `borrowers`";
$result = mysqli_query($conn, $SQL_QUERY);
$count = 0;

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        extract($row);

        $status = get_status($end_date);

        $count ++;

        $books = explode(";",$book);
        $books_string = "";

        foreach($books as $b){
            $books_string .= "<span class=\"books\">$b</span>";
        }

        echo "
           <tr class=\"table_row\">
                <th scope=\"row\">$count</th>
                <td class=\"id id_number\">STUDENT_$ID</td>
                <td class=\"book_title\">$books_string</td>
                <td class=\"name\">$name</td>
                <td class=\"p_number\">$phone_num</td>
                <td class=\"start_date\">$start_date</td>
                <td class=\"end_date\">$end_date</td>
                <td class=\"status\">$status</td>
                <td class=\"action\">
                    <a href=\"\" class=\"link-primary edit_borrower_btn\" data-bs-toggle=\"modal\"
                        data-bs-target=\"#edit_borrower_modal\">
                        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\"
                            class=\"bi bi-pencil-square\" viewBox=\"0 0 16 16\">
                            <path
                                d=\"M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z\" />
                            <path fill-rule=\"evenodd\"
                                d=\"M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z\" />
                        </svg>
                    </a>
                    <a href=\"\" class=\"link-danger delete_borrower_btn\" data-bs-toggle=\"modal\"
                        data-bs-target=\"#delete_borrower_modal\">
                        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\"
                            class=\"bi bi-trash3-fill\" viewBox=\"0 0 16 16\">
                            <path
                                d=\"M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5\" />
                        </svg>
                    </a>
                </td>
            </tr>
        ";
    }
}

//$conn variable is from db_connect.php
mysqli_close($conn);