<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php
if(isset($_GET["subject"])) {
    $selected_subject_id = $_GET["subject"];
    $selected_page_id = null;
} elseif(isset($_GET["page"])) {
    $selected_subject_id = null;
    $selected_page_id = $_GET["page"];
} else {
    $selected_subject_id = null;
    $selected_page_id = null;
}
?>
<div id="main">
    <div id="navigation">
        <ul class="subjects">
        <?php
        $subject_set = find_all_subjects();

        while($subject = mysqli_fetch_assoc($subject_set)) {
            echo "<li>"
                . "<a href=\"manage_content.php?subject="
                . urlencode($subject["id"])
                . "\">"
                . "{$subject["menu_name"]}"
                . "<ul class=\"pages\">";

            $page_set = find_pages_for_subject($subject["id"]);

            while($page = mysqli_fetch_assoc($page_set)) {
                echo "<li>"
                    . "<a href=\"manage_content.php?page="
                    . urlencode($page["id"])
                    . "\">"
                    . "{$page["menu_name"]}"
                    . "</a>"
                    . "</li>";
            }

            mysqli_free_result($page_set);

            echo "</ul>"
                . "</a>"
                . "</li>";
        }

        mysqli_free_result($subject_set);
        ?>
        </ul>
    </div>
    <div id="page">
        <h2>Manage Content</h2>
        <?php
        echo "selected subject: {$selected_subject_id}"
            . "<br />"
            . "selected page: {$selected_page_id}"
            . "<br />";
        ?>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>