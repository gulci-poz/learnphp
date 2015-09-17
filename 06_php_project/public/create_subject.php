<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
if(isset($_POST["submit"])) {
    $menu_name = mysql_prep($_POST["menu_name"]);
    $position = (int) $_POST["position"];
    $visible = (int) $_POST["visible"];

    $query = "insert into ";
    $query .= "subjects (";
    $query .= "menu_name, position, visible";
    $query .= ") values (";
    $query .= "'{$menu_name}', {$position}, {$visible}";
    $query .= ")";

    $result = mysqli_query($connection, $query);

    if($result) {
        // udało się
        $_SESSION["message"] = "Subject created.";
        redirect_to("manage_content.php");
    } else {
        // nie udało się
        // to dość poważne, jest z problem z zapisem danych do bazy
        $_SESSION["message"] = "Subject creation failed.";
        redirect_to("new_subject.php");
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