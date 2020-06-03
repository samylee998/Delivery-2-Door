<h2>Selection</h2> 
<p> Select table first, and then fill relevant fields.</p>
<form method="post" action="">
    Table: <input type="text" id = "selection-table" name="selection-table" placeholder="<Table Name>"><br>
    <div id="selectionList"></div>
    <input type="submit" name="selection-table-submit" value="submit">
</form>

<script>
    var allTables = <?php echo json_encode($allTablesFinal); ?>;
    console.log(allTables);
    $(document).ready(function() {
        $('#selection-table').change(function() {
            var table = $('#selection-table').val(); 
            if(allTables.includes(table)){
                console.log("Table exists");
                console.log(table);
                $.ajax({
                    type: 'POST',
                    url: "http://localhost:8080/manager-queries/get-table-columns.php",
                    data: {
                        tableSelected: table
                    },
                    success: function( result ) {
                        console.log(result);
                        $('#selectionList').html(result); 
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
    if(isset($_POST['selection-table-submit'])){
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

        $fromStmt = " FROM " . $_POST['selection-table'];
        $sqlStmt = $selectStmt . $fromStmt;

        // Name: selection-table Value: Contains Name: selected_list Value: Array Name: customer_id Value: 123 Name: order_num Value: 1 Name: item_id Value: 2 Name: selection-table-submit Value: submi
        $whereStmt = " WHERE ";
        foreach($_POST as $key => $value){
            if($key == 'selection-table' or $key == 'selected_list' or $key == 'selection-table-submit' or $value == ''){
                continue;
            }
            $whereStmt = $whereStmt . $key . " " . $value . " AND ";
        }
        if($whereStmt == " WHERE "){
            $whereStmt = '';
        }
        else{
            $whereStmt = rtrim($whereStmt, ' AND ');
        }
        $sqlStmt = $sqlStmt . $whereStmt;
        // echo $sqlStmt."\n";

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