<?php
include "../private/connect.php";

$table = $_POST['tableSelected'];
$sqlStmt = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$table'";

try {
    $conn = OpenConnection();
    $sql = $conn->prepare($sqlStmt);
    $sql->execute();
    $result = $sql->fetchAll();

    // $cols = $sql->columnCount();
    $rows = $sql->rowCount();

    // for ($i = 0; $i < $cols; $i++) {
    //     $col = $sql->getColumnMeta($i);
    //     $colNames[] = $col['name'];
    // }

    $output = array();
    echo "SELECT <br>";
    for($i = 0; $i < $rows; $i++):
        echo $result[$i][0] . ":" . " <input type='checkbox' name='selected_list[] placeholder='". $result[$i][0] . "'" . " value='" . $result[$i][0] . "' <br> <br> ";
    endfor; 
    echo "WHERE <br>";
    for($i = 0; $i < $rows; $i++):
        echo $result[$i][0] . ":" . " <input type='text' name='" . $result[$i][0] . "' placeholder='". $result[$i][0] . "'". " <br> <br> ";
    endfor; 
    // echo $output[0];
    // echo $output[1];
    // Table: <input type="text" id = "selection-table" name="selection-table" placeholder="<Table Name>"><br>
    // <br>

}
catch(PDOException $e) {
    echo $e;
}
?>