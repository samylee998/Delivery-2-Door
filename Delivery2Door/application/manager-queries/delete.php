<h2>Delete Inventory Item</h2> 
<p> This will delete an inventory item with the specified ID</p>
<form method="post" action="">
    ID: <input type="text" name="iid" placeholder="<item ID>"><br>
    <br>
    <input type="submit" name="delete-table-submit" value="submit">
</form>
<?php
    try{
        $showFirstTable = true;
        $conn = OpenConnection();
        $sql2 = $conn->prepare("SELECT * FROM InventoryItem");
        $sql2->execute();
        $result = $sql2->fetchAll();
        $cols = $sql2->columnCount();
        $rows = $sql2->rowCount();
        for ($i = 0; $i < $cols; $i++) {
            $col = $sql2->getColumnMeta($i);
            $invColNames1[] = $col['name'];
        }
    }
    catch(PDOException $e){
        $showFirstTable = false;
        echo $e;
    }
    if($showFirstTable){
        echo"<h4>InventoryItem</h4>";
        createTable($result, $cols, $rows, $invColNames1);
    }
    if(isset($_POST['delete-table-submit'])){
        $showTable = true;
        $iid = $_POST['iid'];            
        $deleteItemStmt = "DELETE FROM InventoryItem WHERE item_id=$iid;";

        try {
            $sql1 = $conn->prepare($deleteItemStmt);
            $sql1->execute();

            $sql2->execute();
            $result = $sql2->fetchAll();
            $cols = $sql2->columnCount();
            $rows = $sql2->rowCount();
            for ($i = 0; $i < $cols; $i++) {
                $col = $sql2->getColumnMeta($i);
                $invColNames2[] = $col['name'];
            }
        }
        catch(PDOException $e) {
            $showTable = false;
            echo $e;
        }
        echo "<br>";
        // echo $deleteItemStmt; 
        echo "<br>"; 
        if ($showTable):
            echo"<h4>InventoryItem</h4>";
            createTable($result, $cols, $rows, $invColNames2);
        else: 
            echo"<h2>Invalid Query</h2>";
        endif;
        echo"<br>";
    }
?>
