<h2>Show Table</h2>
<form method="post" action="">
    Show Table:
    <input type="text" id="show-table" name="table-name">
    <input type="submit" name="show-table-submit" value="submit">
</form>

<script>
    var allTables = <?php echo json_encode($allTablesFinal); ?>;
    $(document).ready(function() {
        $('#show-table').change(function() {
            var table = $('#show-table').val(); 
            if(allTables.includes(table)){
                console.log("Table exists");
                console.log(table);
            }
            else{
                alert("Table does not exist to select from");
            }
        })
    });
</script>

<?php
    if (isset($_POST['show-table-submit'])) {
        $table = $_POST['table-name'];
        $selectStmt = "SELECT * FROM $table";
        $showTable = true;

        try {
            $conn = OpenConnection();
            $sql = $conn->prepare($selectStmt);
            $sql->execute();
            $result = $sql->fetchAll();

            $cols = $sql->columnCount();
            $rows = $sql->rowCount();

            for ($i = 0; $i < $cols; $i++) {
                $col = $sql->getColumnMeta($i);
                $colNames[] = $col['name'];
            }
        }
        catch(PDOException $e) {
            $showTable = false;
        }
        if ($showTable):
            createTable($result, $cols, $rows, $colNames);
        else:
            echo"<h2>Invalid Table Name</h2>";
        endif;
    }
?>
