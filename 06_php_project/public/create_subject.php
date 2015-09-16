<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
if(isset($_POST["submit"])) {
    $menu_name = $_POST["menu_name"];
    $position = (int) $_POST["position"];
    $visible = (int) $_POST["visible"];

    $menu_name = mysqli_real_escape_string($connection, $menu_name);

    $query = "insert into ";
    $query .= "subjects (";
    $query .= "menu_name, position, visible";
    $query .= ") values (";
    $query .= "'{$menu_name}', {$position}, {$visible}";
    $query .= ")";

    $result = mysqli_query($connection, $query);

    if($result) {
        // udało się
        redirect_to("manage_content.php");
    } else {
        // 4 - 6:33
    }
} else {
    // jeśli strona zostanie wyświetlona inaczej niż poprzez kliknięcie w submit w new_subject.php
    // prawdopodobnie GET
    redirect_to("new_subject.php");
}
?>
<?php
if(isset($connection)) {
    mysqli_close($connection);
}
?>