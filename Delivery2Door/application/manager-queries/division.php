<h2>Division</h2>
<p>Find all customers who bought every item in inventory.</p>
<form method="post" action="">
    Run the query:
    <input type="submit" name="division-submit" value="submit">
</form>

<?php
    $showTable = false;
    if (isset($_POST['division-submit'])) {
        $showTable = true;
        $divisionStmt = "SELECT c.customer_id, c.name
            FROM Customer c
            WHERE NOT EXISTS
            (SELECT item_id FROM InventoryItem
            WHERE item_id NOT IN
            (SELECT con.item_id
            FROM Contains con
            WHERE c.customer_id=con.customer_id))";

        try {
            $conn = OpenConnection();
            $sql1 = $conn->prepare($divisionStmt);
            $sql1->execute();
            $result = $sql1->fetchAll();
            $rows = $sql1->rowCount();
        }
        catch(PDOException $e) {
            $showTable = false;
        }

        if($showTable) {
            createTable($result, 2, $rows, ["CID", "Customer Name"]);
        } else {
            echo"<h2>Invalid Query</h2>";
        }
    }
?>
