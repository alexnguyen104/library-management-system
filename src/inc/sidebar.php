<!-- Sidebar-->
<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light">Library Management</div>
    <div class="list-group list-group-flush">
        <?php
            $pages = ["dashboard", "books", "borrowers", "genres"];
            $class_attribute = "list-group-item list-group-item-action list-group-item-light p-3";
            for($i = 0; $i < count($pages); $i++){
                $page_name = ucfirst($pages[$i]);
                if(basename($_SERVER['PHP_SELF'], ".php") == $pages[$i]){
                    $class_attribute_active = $class_attribute . " active";
                    echo
                    "
                    <a class=\"$class_attribute_active\">$page_name</a>
                    ";
                }else{
                    $page_href = $pages[$i] . '.php';
                    echo
                    "
                    <a class=\"$class_attribute\" href=\"$page_href\">$page_name</a>
                    ";
                }
            }
        ?>
    </div>
</div>
<!-- Page content wrapper-->
<div id="page-content-wrapper">
    <button class="btn" id="sidebarToggle" aria-label="toggle" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
        </svg>
    </button>