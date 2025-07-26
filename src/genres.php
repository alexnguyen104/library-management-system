<?php
        require_once __DIR__ . "/inc/header.php";
        require_once __DIR__ . "/inc/sidebar.php";
        
    ?>

<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">
        <?=ucfirst(basename($_SERVER['PHP_SELF'], ".php"))?>
    </h1>

    <button type="button" id="add_genre" class="btn btn-primary my_btn" data-bs-toggle="modal"
        data-bs-target="#add_genre_modal">
        Add genre
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
        </svg>
    </button>

    <table class="table table-bordered">
        <thead class="table">
            <tr>
                <th scope="col">Genre ID</th>
                <th scope="col">Genres</th>
                <th scope="col">Action</th>               
            </tr>
        </thead>
        <tbody id="genre_table">
            <?php
                require_once __DIR__ . "/inc/genres/genres_update.php";
            ?>          
        </tbody>
    </table>
</div>

<!-- Modals -->
<div class="modal fade" id="add_genre_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Add New Genre</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="inc/genres/genres_add.php" method="post">
                <div class="modal-body">                    
                    <div class="mb-3">
                        <label for="add_genre_modal" class="col-form-label">Genre:</label>
                        <input type="text" class="form-control add_modal_input" required id="add_genre_modal"
                            name="add_genre_modal">
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

<div class="modal fade" id="delete_genre_modal" tabindex="-1" aria-labelledby="delete_genre_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Delete this genre</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="inc/genres/genres_delete.php" method="post">
                <input type="hidden" id="delete_genre_id_modal" name="delete_genre_id_modal"> <!-- Hidden ID field - value is passed by js -->
                <div class="modal-body delete_body">
                    <!-- default case if genre name goes wrong -->
                    Are you sure you want to delete this genre?
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