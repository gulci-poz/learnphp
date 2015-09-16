<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page(); ?>
<div id="main">
    <div id="navigation">
        <?php
        echo navigation($current_subject, $current_page);
        ?>
        <br />
        <a href="new_subject.php">+ Add a subject</a>
    </div>
    <div id="page">
        <?php
        if($current_subject) {
            echo "<h2>Manage Subject</h2>" . "<br />";
            echo "Menu name: " . $current_subject["menu_name"];
        } elseif($current_page) {
            echo "<h2>Manage Page</h2>" . "<br />";
            echo $current_page["content"];
        } else {
            echo "<h2>Select a subject or a page</h2>";
        }
        ?>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>