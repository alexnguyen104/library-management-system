document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('title_filter').addEventListener('keyup', function () {
        const search = this.value.toLowerCase();
        const rows = document.querySelectorAll('#book_table tr');

        rows.forEach(row => {
            const rowText = row.querySelector(".title").textContent.toLowerCase();
            row.style.display = rowText.includes(search) ? '' : 'none';
        });
    });

    document.getElementById('author_filter').addEventListener('keyup', function () {
        const search = this.value.toLowerCase();
        const rows = document.querySelectorAll('#book_table tr');

        rows.forEach(row => {
            const rowText = row.querySelector(".author").textContent.toLowerCase();
            row.style.display = rowText.includes(search) ? '' : 'none';
        });
    });

    const edit_book_btn = document.getElementsByClassName('edit_book_btn');
    const delete_book_btn = document.getElementsByClassName("delete_book_btn");
    const row = document.getElementsByClassName("table_row");
    const modal_input = document.getElementsByClassName("edit_modal_input");

    for (let i = 0; i < edit_book_btn.length; i++) {
        let book_id = row[i].getElementsByTagName("td")[0].textContent.split("_")[1];
        let book_name = row[i].getElementsByTagName("td")[1].textContent;

        edit_book_btn[i].addEventListener('click', function () {
            for (let j = 0; j < 3; j++) {
                let table_row_value = row[i].getElementsByTagName("td")[j + 1].innerHTML;
                modal_input[j].value = table_row_value;
            }
            document.getElementById("edit_book_id_modal").value = book_id;
        });

        delete_book_btn[i].addEventListener('click', function () {
            document.getElementsByClassName("delete_body")[0].textContent = 'Are you sure you want to delete' + book_name + '"?'
            document.getElementById("delete_book_id_modal").value = book_id;
        });
    };

});

