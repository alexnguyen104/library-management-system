document.addEventListener('DOMContentLoaded', function () {
    const delete_genre_btn = document.getElementsByClassName("delete_genre_btn");
    const genre_rows = document.getElementsByClassName("genre");
    const row = document.getElementsByClassName("table_row");

    for (let i = 0; i < genre_rows.length; i++) {
        let genre_id = row[i].getElementsByTagName("th")[0].textContent;
        let genre_name = row[i].getElementsByTagName("td")[1].textContent;

        delete_genre_btn[i].addEventListener('click', function () {
            document.getElementsByClassName("delete_body")[0].textContent = 'Are you sure you want to delete' + genre_name + '"?'
            document.getElementById("delete_genre_id_modal").value = genre_id;
        });
    };
});