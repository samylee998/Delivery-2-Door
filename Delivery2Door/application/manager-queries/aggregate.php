<h2>Aggregation</h2>
<p>Find the minimum, maximum, or average price of all items in inventory.</p>
<form method="post" action="">
    Operation: 
    <select name="agg-operation">
        <option value="MIN">Minimum</option>
        <option value="MAX">Maximum</option>
        <option value="AVG">Average</option>
    </select>
    <input type="submit" name="agg-submit" value="submit">
</form>

<?php
    $showTable = false;
    if (isset($_POST['agg-submit'])) {
        $showTable = true;
        $aggOperation = $_POST['agg-operation'];
        $aggStmt = "SELECT $aggOperation(price) from InventoryItem";

        switch ($aggOperation) {
            case 'MIN':
                $aggOperationLower = "Minimum";
                break;
            
            case 'MAX':
                $aggOperationLower = "Maximum";
                break;

            default:
                $aggOperationLower = "Average";
                break;
        }

        try {
            $conn = OpenConnection();
            $sql1 = $conn->prepare($aggStmt);
            $sql1->execute();
            $result = $sql1->fetch(PDO::FETCH_ASSOC);
            $result = $result["$aggOperation(price)"];
        }
        catch(PDOException $e) {
            $showTable = false;
        }

        if($showTable) {
            echo "<h4>$aggOperationLower price of all items is $$result.</h4>";
        } else {
            echo"<h2>Invalid Query</h2>";
        }
    }
?>
