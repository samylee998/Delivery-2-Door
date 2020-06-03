<?php
include "../private/connect.php";

$table = $_POST['tableSelected'];
$sqlStmt = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$table'";

try {
    $conn = OpenConnection();
    $sql = $conn->prepare($sqlStmt);
    $sql->execute();
    $result = $sql->fetchAll();

    $rows = $sql->rowCount();

    $output = array();
    echo "SELECT <br>";
    for($i = 0; $i < $rows; $i++):
        echo $result[$i][0] . ":" . " <input type='checkbox' name='selected_list[] placeholder='". $result[$i][0] . "'" . " value='" . $result[$i][0] . "' <br> <br> ";
    endfor; 

}
catch(PDOException $e) {
    echo $e;
}
?>