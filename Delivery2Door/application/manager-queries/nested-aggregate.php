<h2>Nested Aggregation</h2>
<p>Find the total price of items purchased by each customer.</p>
<form method="post" action="">
    Run the query:
    <input type="submit" name="nested-agg-submit" value="submit">
</form>

<?php
    $showTable = false;
    if (isset($_POST['nested-agg-submit'])) {
        $showTable = true;
        $nestedAggStmt = "SELECT c.name, SUM(i.price) 
            FROM Customer c, Contains con, InventoryItem i 
            WHERE c.customer_id=con.customer_id AND i.item_id=con.item_id 
            GROUP BY c.name";

        try {
            $conn = OpenConnection();
            $sql1 = $conn->prepare($nestedAggStmt);
            $sql1->execute();
            $result = $sql1->fetchAll();
            $rows = $sql1->rowCount();
        }
        catch(PDOException $e) {
            $showTable = false;
        }

        if($showTable) {
            createTable($result, 2, $rows, ["Customer Name", "Total Amount Spent ($)"]);
        } else {
            echo"<h2>Invalid Query</h2>";
        }
    }
?>
