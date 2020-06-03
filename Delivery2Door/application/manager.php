<?php
    include "private/connect.php";
    include_once "private/table.php";

    try {
        $conn = OpenConnection();
        $sql = $conn->prepare("SHOW TABLES");
        $sql->execute();
        $allTables = $sql->fetchAll();
        $cols = $sql->columnCount();
        $rows = $sql->rowCount();

        $allTablesFinal = array();
        for($i = 0; $i < $rows; $i++):
            array_push($allTablesFinal, $allTables[$i][0]);
        endfor; 
    }
    catch(PDOException $e) {
        $allTablesFinal = Null;
    }
?>

<!doctype html>

<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <meta charset="utf-8">
  <title>Manager Page</title>
  <style>
    table, td, th { border: 1px solid black; }
  </style>
</head>

<body>
    <?php include_once "manager-queries/show.php"; ?>
    <?php include_once "manager-queries/insert.php"; ?>
    <?php include_once "manager-queries/update.php" ?>
    <?php include_once "manager-queries/delete.php"; ?>
    <?php include_once "manager-queries/join.php"; ?>
    <?php include_once "manager-queries/selection.php"; ?>
    <?php include_once "manager-queries/projection.php"; ?>
    <?php include_once "manager-queries/aggregate.php"; ?>
    <?php include_once "manager-queries/nested-aggregate.php"; ?>
    <?php include_once "manager-queries/division.php"; ?>
</body>
</html>
