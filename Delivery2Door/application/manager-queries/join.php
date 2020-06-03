<h2>Join</h2>
<p>Find the names of all customers who bought some item.</p>
<form method="post" action="">
    Item Name: 
    <input type="text" name="join-iname" placeholder="<item name>">
    <input type="submit" name="join-submit" value="submit">
</form>

<?php
    $showTable = false;
    if (isset($_POST['join-submit'])) {
        $showTable = true;
        $joinItemName = $_POST['join-iname'];
        $joinStmt = "SELECT c.name FROM Customer c, Contains con, InventoryItem i "
        ."WHERE c.customer_id=con.customer_id AND con.item_id=i.item_id AND i.name='$joinItemName'";

        try {
            $conn = OpenConnection();
            $sql1 = $conn->prepare($joinStmt);
            $sql1->execute();
        }
        catch(PDOException $e) {
            $showTable = false;
        }

        if($showTable) {
            echo "<br><table>";
            echo "<tr><th>Names of customers who bought $joinItemName</th></tr>";
            foreach($sql1 as $row){
                $cellData = $row['name'];
                echo "<tr><td>$cellData</tr></td>";
            }
            echo "</table>";
        } else {
            echo"<h2>Invalid Query</h2>";
        }
    }
?>
