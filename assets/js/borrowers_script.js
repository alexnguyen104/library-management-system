document.addEventListener('DOMContentLoaded', function () {
    // table filter
    document.getElementById('s_id_filter').addEventListener('keyup', function () {
        const search = this.value.toLowerCase();
        const rows = document.querySelectorAll('#user_table tr');

        rows.forEach(row => {
            const rowText = row.querySelector(".id_number").textContent.toLowerCase();
            row.style.display = rowText.includes(search) ? '' : 'none';
        });
    });

    document.getElementById('name_filter').addEventListener('keyup', function () {
        const search = this.value.toLowerCase();
        const rows = document.querySelectorAll('#user_table tr');

        rows.forEach(row => {
            const rowText = row.querySelector(".name").textContent.toLowerCase();
            row.style.display = rowText.includes(search) ? '' : 'none';
        });
    });

    function get_status_color(status) {
        let status_color_class = "";
        if (status.textContent == "On Time") {
            status_color_class = "success";
        } else if (status.textContent == "Overdue") {
            status_color_class = "danger";
        } else {
            status_color_class = "warning";
        }
        return status_color_class;
    }

    const edit_borrower_btn = document.getElementsByClassName('edit_borrower_btn');
    const delete_borrower_btn = document.getElementsByClassName("delete_borrower_btn");
    const row = document.getElementsByClassName("table_row");
    const modal_input = document.getElementsByClassName("edit_modal_input");
    const end_date_rows = document.getElementsByClassName("end_date");
    const status_rows = document.getElementsByClassName("status");


    for (let i = 0; i < edit_borrower_btn.length; i++) {
        let borrower_id = row[i].getElementsByTagName("td")[0].textContent.split("_")[1];
        let borrower_name = row[i].getElementsByTagName("td")[1].textContent;

        edit_borrower_btn[i].addEventListener('click', function () {
            for (let j = 0; j < 4; j++) {
                modal_input[j].value = row[i].getElementsByTagName("td")[j + 2].textContent
            }
            document.getElementById("id_num_modal").value = borrower_id;
        });
        delete_borrower_btn[i].addEventListener('click', function () {
            document.getElementsByClassName("delete_body")[0].textContent = 'Are you sure you want to delete "' + borrower_name + '"?';
            document.getElementById("delete_borrower_id_modal").value = borrower_id;
        });

        // set status color
        status_rows[i].className += " text-" + get_status_color(status_rows[i]);;
    };

    // set start date and end date
    const start_date_input = document.getElementsByClassName('start_date_input');
    const end_date_input = document.getElementsByClassName('end_date_input');

    for(let i = 0; i < start_date_input.length; i++){
        start_date_input[i].addEventListener('change', function () {
            const selected_start_date = this.value;
            end_date_input[i].setAttribute('min', selected_start_date);

            // If end date is before new start date, adjust it
            if (end_date_input[i].value < selected_start_date) {
                end_date_input[i].value = selected_start_date;
            }
        });
    }
    
});