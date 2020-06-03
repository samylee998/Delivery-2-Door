<h2>Projection</h2> 
<p> Select table first, and then fill relevant fields.</p>
<form method="post" action="">
    Table: <input type="text" id = "projection-table" name="projection-table" placeholder="<Table Name>"><br>
    <div id="projectionList"></div>
    <input type="submit" name="projection-table-submit" value="submit">
</form>

<script>
    var allTables = <?php echo json_encode($allTablesFinal); ?>;
    console.log(allTables);
    $(document).ready(function() {
        $('#projection-table').change(function() {
            var table = $('#projection-table').val(); 
            if(allTables.includes(table)){
                console.log("Table exists");
                console.log(table);
                $.ajax({
                    type: 'POST',
                    url: "http://localhost:8080/manager-queries/get-table-columns-projection.php",
                    data: {
                        tableSelected: table
                    },
                    success: function( result ) {
                        console.log(result);
                        $('#projectionList').html(result); 
                    }
                });
            }
            else{
                alert("Table does not exist to select from");
            }
        })
    });
</script>

<?php
    if(isset($_POST['projection-table-submit'])){
        $showTable = true;
        $selectStmt = "SELECT ";
        if(!empty($_POST['selected_list'])){
            // Loop to store and display values of individual checked checkbox.
            foreach($_POST['selected_list'] as $selected){
                if(isset($selected)){
                    $selectStmt = $selectStmt . $selected . ", ";
                }
            }
        }
        $selectStmt = rtrim($selectStmt, ", ");

        $fromStmt = " FROM " . $_POST['projection-table'];
        $sqlStmt = $selectStmt . $fromStmt;

        // Name: projection-table Value: Contains Name: selected_list Value: Array Name: customer_id Value: 123 Name: order_num Value: 1 Name: item_id Value: 2 Name: projection-table-submit Value: submi


        try {
            $conn = OpenConnection();
            $sql = $conn->prepare($sqlStmt);
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
            echo"<h2>Invalid Query</h2>";
        endif;
    }
?>