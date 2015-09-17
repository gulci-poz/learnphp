<?php
function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}

function mysql_prep($string) {
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}

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
    //$query .= "where visible = 1 ";
    $query .= "order by position asc";
    $subject_set = mysqli_query($connection, $query);
    confirm_query($subject_set);

    return $subject_set;
}

function find_pages_for_subject($subject_id) {
    global $connection;

    // uwaga na SQL Injection
    $safe_subject_id = mysqli_real_escape_string($connection, $subject_id);

    $query = "select * ";
    $query .= "from pages ";
    //$query .= "where visible = 1 ";
    //$query .= "and subject_id = {$safe_subject_id} ";
    $query .= "where subject_id = {$safe_subject_id} ";
    $query .= "order by position asc";
    $page_set = mysqli_query($connection, $query);
    confirm_query($page_set);

    return $page_set;
}

function find_subject_by_id($subject_id) {
    global $connection;

    // uwaga na SQL Injection
    $safe_subject_id = mysqli_real_escape_string($connection, $subject_id);

    $query = "select * ";
    $query .= "from subjects ";
    $query .= "where id = {$safe_subject_id} ";
    $query .= "limit 1";
    $subject_set = mysqli_query($connection, $query);
    confirm_query($subject_set);
    // powinniśmy mieć tylko jeden temat, nie potrzeba pętli
    if($subject = mysqli_fetch_assoc($subject_set)) {
        return $subject;
    } else {
        return null;
    }
}

function find_page_by_id($page_id) {
    global $connection;

    // uwaga na SQL Injection
    $safe_page_id = mysqli_real_escape_string($connection, $page_id);

    $query = "select * ";
    $query .= "from pages ";
    $query .= "where id = {$safe_page_id} ";
    $query .= "limit 1";
    $page_set = mysqli_query($connection, $query);
    confirm_query($page_set);
    // powinniśmy mieć tylko jedną stronę, nie potrzeba pętli
    if($page = mysqli_fetch_assoc($page_set)) {
        return $page;
    } else {
        return null;
    }
}

function find_selected_page() {
    // możemy użyć globalnych zmiennych, nawet jeśli nie zostały jeszcze zadeklarowane
    global $current_subject;
    global $current_page;

    if(isset($_GET["subject"])) {
        // separacja zapytania od miejsca jego wyświetlenia
        // najlepiej jak najwcześniej
        $current_subject = find_subject_by_id($_GET["subject"]);
        $current_page = null;
    } elseif(isset($_GET["page"])) {
        $current_page = find_page_by_id($_GET["page"]);
        $current_subject = null;
    } else {
        $current_subject = null;
        $current_page = null;
    }
}

function navigation($subject_array, $page_array) {
    $output =  "<ul class=\"subjects\">";

    $subject_set = find_all_subjects();

    while($subject = mysqli_fetch_assoc($subject_set)) {
        $output .= "<li";
        // sprawdzamy dodatkowo istnienie tematu
        if($subject_array && $subject["id"] == $subject_array["id"]) {
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
            // sprawdzamy dodatkowo istnienie strony
            if($page_array && $page["id"] == $page_array["id"]) {
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