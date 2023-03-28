<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';
?>

<body>
    <?php



    if (isset($_POST["submit"])) {
        $content = $_POST["body"];
    }
    ?>


    <section class="individual-post content-test-section">
        <div class="container individual-post-container content-test-container">
            <div class="individual-post-content content-test-content">
                <h5 class="individual-post-title content-test-title">Title</h5>
                <div class="content-test-body">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
    ?>