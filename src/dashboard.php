<?php
        require_once __DIR__ . "/inc/header.php";
        require_once __DIR__ . "/inc/sidebar.php";
        require_once __DIR__ . "/inc/dashboard_update.php";
    ?>

<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">
        <?=ucfirst(basename($_SERVER['PHP_SELF'], ".php"))?>
    </h1>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center flex-column">
                    <h5 class="card-title">Total number of <span class="text-primary">books</span></h5>
                    <h1 class="card-text"><?= $num_works?></h1>
                    <a href="books.php" class="link-primary align-self-start">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
                            <path fill-rule="evenodd"
                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center flex-column">
                    <h5 class="card-title">Total number of <span class="text-primary">holdings</span></h5>
                    <h1 class="card-text"><?= $num_books?></h1>
                    <a href="books.php" class="link-primary align-self-start">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
                            <path fill-rule="evenodd"
                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>      
    </div>
    <br>
    <div class="row">
         <div class="col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center flex-column">
                    <h5 class="card-title">Number of <span class="text-warning">books being borrowed</span></h5>
                    <h1 class="card-text"><?= $num_borrowers?></h1>
                    <a href="borrowers.php" class="link-primary align-self-start">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
                            <path fill-rule="evenodd"
                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
         <div class="col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center flex-column">
                    <h5 class="card-title">Number of <span class="text-danger">overdue borrowers</span></h5>
                    <h1 class="card-text"><?= $num_overdues?></h1>
                    <a href="books.php" class="link-primary align-self-start">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
                            <path fill-rule="evenodd"
                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
        require_once __DIR__ . "/inc/footer.php"
    ?>