<?php
    include_once "private/connect.php";
    include_once "private/table.php";

    $validLogin = false;
    $validQuery = true;
    if (isset($_POST['cid'])) {
        $cid = $_POST['cid'];
        $validLogin = true;
    }
    try {
        $conn = OpenConnection();
        $sql1 = $conn->prepare("SELECT name FROM Customer WHERE customer_id=$cid");
        $sql1->execute();
        $result = $sql1->fetch(PDO::FETCH_ASSOC);
        $customerName = $result['name'];
        if (!$customerName) {
            $validLogin = false;
        }

        if (isset($_POST['newOrderSubmit'])) {
            $newOrderNum = $_POST['newOrderNum'];
            $sqlNewOrder = $conn->prepare("INSERT INTO Orders 
                VALUES ($newOrderNum, 0.00, '2021-01-01', $cid, 1, 2)");
            $sqlNewOrder->execute();
        }

        if (isset($_POST['addItemSubmit'])) {
            $addItemOrderNum = $_POST['addItemOrderNum'];
            $addItemNum = $_POST['addItemNum'];
            $sqlAddItem = $conn->prepare("INSERT INTO Contains VALUES ($cid, $addItemOrderNum, $addItemNum)");
            $sqlAddItem->execute();
        }

        $sql2 = $conn->prepare("SELECT o.order_num, i.name, i.price
            FROM Orders o 
            LEFT OUTER JOIN Contains c ON o.order_num=c.order_num 
            AND o.customer_id=c.customer_id 
            LEFT OUTER JOIN InventoryItem i ON c.item_id=i.item_id
            WHERE o.customer_id=$cid");
        $sql2->execute();
        $ordersResult = $sql2->fetchAll();
        $ordersRows = $sql2->rowCount();

        $sqlAllItems = $conn->prepare("SELECT * FROM InventoryItem");
        $sqlAllItems->execute();
        $allItemsResult = $sqlAllItems->fetchAll();
        $itemsRows = $sqlAllItems->rowCount();
    }
    catch(PDOException $e) {
        $validQuery = false;
        // echo $e;
    }
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Shop</title>
  <style>
    table, td, th { border: 1px solid black; }
  </style>
</head>

<body>
    <?php if(!$validLogin): ?>
        <h1>Something went wrong.</h1>
        <h3>Please <a href="login.php">log in</a> with a valid Customer ID.</h3>
    <?php elseif(!$validQuery): ?>
        <h1>Something went wrong.</h1>
        <h3>Invalid query. Please try again.</h3>
        <form method="post" action="">
            <input type="submit" name="" value="Go Back">
            <?php echo "<input type='hidden' name='cid' value='$cid'>"; ?>
        </form>
    <?php else: ?>
    <h1><?php echo "Hello, $customerName!" ?></h1>
    <h2>Your Orders</h2>
    <?php createTable($ordersResult, 3, $ordersRows, ['Order Num', 'Item Name', 'Price']); ?>
        <br>
        <h2>Create a New Order</h2>
        <form method="post" action="">
            Order Number:
            <input type="number" name="newOrderNum">
            <input type="submit" name="newOrderSubmit" value="submit">
            <?php echo "<input type='hidden' name='cid' value='$cid'>"; ?>
        </form>

        <h2>Order an Item</h2>
        <p>Add an item to an existing order</p>
        <form method="post" action="">
            Order Number:
            <input type="number" name="addItemOrderNum"><br>
            Item ID:
            <input type="number" name="addItemNum"><br>
            <input type="submit" name="addItemSubmit" value="submit">
            <?php echo "<input type='hidden' name='cid' value='$cid'>"; ?>
        </form>
        
        <h2>Available Items</h2>
        <?php createTable($allItemsResult, 3, $itemsRows, ['Item ID', 'Name', 'Price']); ?>
    <?php endif; ?>
</body>
</html>
