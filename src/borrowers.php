<?php
    session_start();    
    require_once __DIR__ . "/inc/header.php";
    // require_once __DIR__ . "/inc/db_connect.php";
    require_once __DIR__ . "/inc/sidebar.php";

    if (isset($_SESSION['duplicate_error'])) {
        $msg = $_SESSION['duplicate_error'];
        echo "<script>alert('$msg');</script>";
        unset($_SESSION['duplicate_error']);
    }
    ?>

<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">
        <?=ucfirst(basename($_SERVER['PHP_SELF'], ".php"))?>
    </h1>

    <button type="button" id="add_borrower" class="btn btn-primary my_btn" data-bs-toggle="modal"
        data-bs-target="#add_borrower_modal">
        Add Borrower
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
        </svg>
    </button>

    <input class="form-control input_filter" id="name_filter" type="text" placeholder="Search by name...">
    <br>
    <input class="form-control input_filter" id="s_id_filter" type="number" placeholder="Search by Student ID...">
    <br>
    <p class="text-danger">* Date format is YYYY-MM-DD</p>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Student ID</th>
                <th scope="col">Book(s)</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="user_table">
            <?php
                require_once __DIR__ . "/inc/borrower/borrower_update.php";
            ?>           
        </tbody>
    </table>
</div>

<!-- Modals -->
<div class="modal fade" id="add_borrower_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Add New Borrower</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="inc/borrower/borrower_add.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="add_name_modal" class="col-form-label">Name:</label>
                        <input required type="text" class="form-control add_modal_input" id="add_name_modal"
                            name="add_name_modal">
                    </div>
                    <div class="mb-3">
                        <label for="add_phone_modal" class="col-form-label">Phone Number:</label>
                        <input required type="tel" pattern="[0]{1}[0-9]{9}" placeholder="0xxxxxxxxx" class="form-control add_modal_input" id="add_phone_modal"
                            name="add_phone_modal">
                    </div>
                    <div class="mb-3">
                        <label for="add_id_num_modal" class="col-form-label">Student ID:</label>
                        <input required type="number" max="99999999999" class="form-control add_modal_input" id="add_id_num_modal"
                            name="add_id_num_modal">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <label for="add_borrowed_books_modal" class="col-form-label">Books: <span class="text-danger">(3 books maximum)</span></label>
                        <select required name="add_borrowed_books_modal[]" id="add_borrowed_books_modal" multiple multiple multiselect-search="true">
                            <?php
                                require_once __DIR__ . "/inc/borrower/borrower_load_books.php";
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="start_date_modal" class="col-form-label">Start Date:</label>
                        <input required type="date" class="form-control add_modal_input start_date_input" id="add_start_date_modal"
                            name="add_start_date_modal">
                    </div>
                    <div class="mb-3">
                        <label for="end_date_modal" class="col-form-label">End Date:</label>
                        <input required type="date" class="form-control add_modal_input end_date_input" id="add_end_date_modal"
                            name="add_end_date_modal">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_borrower_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Borrower Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="inc/borrower/borrower_edit.php" method="post">
                <div class="modal-body">
                    <input required type="hidden" id="id_num_modal" name="id_num_modal">
                    <div class="mb-3">
                        <label for="name_modal" class="col-form-label">Name:</label>
                        <input required type="text" class="form-control edit_modal_input" id="name_modal" name="name_modal">
                    </div>
                    <div class="mb-3">
                        <label for="phone_modal" class="col-form-label">Phone Number:</label>
                        <input required type="tel" pattern="[0]{1}[0-9]{9}" placeholder="0xxxxxxxxx" class="form-control edit_modal_input" id="phone_modal" name="phone_modal">
                        
                    </div>                   
                    <div class="mb-3">
                        <label for="start_date_modal" class="col-form-label">Start Date:</label>
                        <input required type="date" class="form-control edit_modal_input start_date_input" id="start_date_modal"
                            name="start_date_modal">
                    </div>
                    <div class="mb-3">
                        <label for="end_date_modal" class="col-form-label">End Date:</label>
                        <input required type="date" class="form-control edit_modal_input end_date_input" id="end_date_modal"
                            name="end_date_modal">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delete_borrower_modal" tabindex="-1" aria-labelledby="delete_book_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete this borrower</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="inc/borrower/borrower_delete.php" method="post">
                <input type="hidden" name="delete_borrower_id_modal" id="delete_borrower_id_modal">
                <div class="modal-body delete_body">
                    Are you sure you want to delete this person?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
        require_once __DIR__ . "/inc/footer.php"
    ?>