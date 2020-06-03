
<h2>Insert Inventory Item</h2>
<form method="post" action="">
    ID: <input type="text" name="iid" placeholder="<item ID>"><br>
    Name: <input type="text" name="name" placeholder="<name>"><br>
    Price: <input type="text" name="price" placeholder="<price>"><br>
    Field 1: <input type="text" name="field1" placeholder="<field 1>"><br>
    Field 2 (optional): <input type="text" name="field2" placeholder="<field 2>"><br>
    Table: 
    <select name="table-name">
        <option value="RetailItem">Retail Item</option>
        <option value="ElectronicItem">Electronic Item</option>
        <option value="FoodItem">Food Item</option>
    </select>
    <br>
    <input type="submit" name="insert-table-submit" value="submit">
</form>
<?php
    if(isset($_POST['insert-table-submit'])){
        $showTable = true;
        $table = $_POST['table-name']; 
        $iid = $_POST['iid'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $field1 = $_POST['field1']; //Must be STRING if retail, INT if Electronic, DATE if FoodItem
        $field2 = $_POST['field2']; //DATE if FoodItem

        $invItemStmt = "INSERT INTO InventoryItem VALUES($iid, '$name', $price, '99 Baz Blvd');";

        switch ($table) {
            case 'RetailItem':
                $subtableStmt = "INSERT INTO $table VALUES($iid, '$field1')";
                break;
            case 'ElectronicItem':
                $subtableStmt = "INSERT INTO $table VALUES($iid, $field1)";
                break;
            default:
                $subtableStmt = "INSERT INTO $table VALUES($iid, '$field1', '$field2')";
        }

        try {
            $conn = OpenConnection();

            $sql1 = $conn->prepare($invItemStmt);
            $sql1->execute();

            $sql2 = $conn->prepare("SELECT * FROM InventoryItem");
            $sql2->execute();
            $result1 = $sql2->fetchAll();
            $cols1 = $sql2->columnCount();
            $rows1 = $sql2->rowCount();
            for ($i = 0; $i < $cols1; $i++) {
                $col1 = $sql2->getColumnMeta($i);
                $colNames1[] = $col1['name'];
            }

            $sql3 = $conn->prepare($subtableStmt);
            $sql3->execute();

            $selectStmt = "SELECT * FROM $table";
            $sql4 = $conn->prepare($selectStmt);
            $sql4->execute();
            $result2 = $sql4->fetchAll();
            $cols2 = $sql4->columnCount();
            $rows2 = $sql4->rowCount();
            for ($i = 0; $i < $cols2; $i++) {
                $col2 = $sql4->getColumnMeta($i);
                $colNames2[] = $col2['name'];
            }
        }
        catch(PDOException $e) {
            $showTable = false;
            echo $e;
        }
        echo "<br>";
        // echo $invItemStmt; 
        echo "<br>"; 
        // echo $subtableStmt;
        if ($showTable):
            echo"<h4>InventoryItem</h4>";
            createTable($result1, $cols1, $rows1, $colNames1);
            echo"<h4>" . $table . "</h4>";
            createTable($result2, $cols2, $rows2, $colNames2);
        else: 
            echo"<h2>Invalid Query</h2>";
        endif;
        echo"<br>";
    }
?>
