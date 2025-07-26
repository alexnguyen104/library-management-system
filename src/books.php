<?php
        require_once __DIR__ . "/inc/header.php";
        require_once __DIR__ . "/inc/sidebar.php";
        
    ?>

<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">
        <?=ucfirst(basename($_SERVER['PHP_SELF'], ".php"))?>
    </h1>

    <button type="button" id="add_book" class="btn btn-primary my_btn" data-bs-toggle="modal"
        data-bs-target="#add_book_modal">
        Add Book
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
        </svg>
    </button>

    <input class="form-control input_filter" id="title_filter" type="text" placeholder="Search by title...">
    <br>
    <input class="form-control input_filter" id="author_filter" type="text" placeholder="Search by author...">
    <br>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Book ID</th>
                <th scope="col">Book Title</th>
                <th scope="col">Author</th>
                <th scope="col">Quantity</th>
                <th scope="col">Genres</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="book_table">
            <?php
                require_once __DIR__ . "/inc/book/book_update.php";
            ?>
        </tbody>
    </table>
</div>

<!-- Modals -->
<div class="modal fade" id="add_book_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Add New Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="inc/book/book_add.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="add_book_title_modal" class="col-form-label">Title:</label>
                        <input type="text" class="form-control add_modal_input" required id="add_book_title_modal"
                            name="add_book_title_modal">
                    </div>
                    <div class="mb-3">
                        <label for="add_author_modal" class="col-form-label">Author:</label>
                        <input type="text" class="form-control add_modal_input" required id="add_author_modal"
                            name="add_author_modal">
                    </div>
                    <div class="mb-3">
                        <label for="add_quantity_modal" class="col-form-label">Quantity:</label>
                        <input type="number" class="form-control add_modal_input" required id="add_quantity_modal"
                            name="add_quantity_modal">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <label for="add_genres_modal" class="col-form-label">Genres:</label>
                        <select required name="add_genres_modal[]" id="add_genres_modal" multiple multiple multiselect-search="true">
                            <?php
                                require __DIR__ . "/inc/book/book_load_genres.php";
                            ?>
                        </select>
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

<div class="modal fade" id="edit_book_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Book Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <form action="inc/book/book_edit.php" method="post">
                <div class="modal-body">
                    <input type="hidden" id="edit_book_id_modal" name="edit_book_id_modal"> <!-- Hidden ID field - value is passed by js -->
                    <div class="mb-3">
                        <label for="edit_book_title_modal" class="col-form-label">Title:</label>
                        <input type="text" class="form-control edit_modal_input" required id="edit_book_title_modal"
                            name="edit_book_title_modal">
                    </div>
                    <div class="mb-3">
                        <label for="edit_author_modal" class="col-form-label">Author:</label>
                        <input type="text" class="form-control edit_modal_input" required id="edit_author_modal"
                            name="edit_author_modal">
                    </div>
                    <div class="mb-3">
                        <label for="edit_quantity_modal" class="col-form-label">Quantity:</label>
                        <input type="number" class="form-control edit_modal_input" required id="edit_quantity_modal"
                            name="edit_quantity_modal">
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

<div class="modal fade" id="delete_book_modal" tabindex="-1" aria-labelledby="delete_book_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Delete this book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="inc/book/book_delete.php" method="post">
                <input type="hidden" id="delete_book_id_modal" name="delete_book_id_modal"> <!-- Hidden ID field - value is passed by js -->
                <div class="modal-body delete_body">
                    <!-- default case if book name goes wrong -->
                    Are you sure you want to delete this book?
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