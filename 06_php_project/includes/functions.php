<?php
function confirm_query($result_set)
{
    if (!$result_set) {
        die('db query failed');
    }
}

function find_all_subjects() {
    global $connection;

    $query = "select * ";
    $query .= "from subjects ";
    $query .= "where visible = 1 ";
    $query .= "order by position asc";
    $subject_set = mysqli_query($connection, $query);
    confirm_query($subject_set);

    return $subject_set;
}

function find_pages_for_subject($subject_id) {
    global $connection;

    $query = "select * ";
    $query .= "from pages ";
    $query .= "where visible = 1 ";
    $query .= "and subject_id = {$subject_id} ";
    $query .= "order by position asc";
    $page_set = mysqli_query($connection, $query);
    confirm_query($page_set);

    return $page_set;
}

function navigation($subject_id, $page_id) {
    $output =  "<ul class=\"subjects\">";

    $subject_set = find_all_subjects();

    while($subject = mysqli_fetch_assoc($subject_set)) {
        $output .= "<li";
        if($subject["id"] == $subject_id) {
            $output .= " class=\"selected\"";
        }
        $output .= ">"
            . "<a href=\"manage_content.php?subject="
            . urlencode($subject["id"])
            . "\">"
            . "{$subject["menu_name"]}"
            . "<ul class=\"pages\">";

        $page_set = find_pages_for_subject($subject["id"]);

        while($page = mysqli_fetch_assoc($page_set)) {
            $output .= "<li";
            if($page["id"] == $page_id) {
                $output .= " class=\"selected\"";
            }
            $output .= ">"
                . "<a href=\"manage_content.php?page="
                . urlencode($page["id"])
                . "\">"
                . "{$page["menu_name"]}"
                . "</a>"
                . "</li>";
        }

        mysqli_free_result($page_set);

        $output .= "</ul>"
            . "</a>"
            . "</li>";
    }

    mysqli_free_result($subject_set);

    $output .= "</ul>";

    return $output;
}
?>