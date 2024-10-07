<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Labs Web Pentesting</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/screen.css" rel="stylesheet" type="text/css"/>
</head>
<body id="top">
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container">
            <div class="masthead clearfix">
                <div class="inner">
                </div>
            </div>
            <br>
        </div>
        <div class="inner cover">
            <p class="mb-5"><a href="/">Go home</a></p>
            <?php
            $userId = isset($_COOKIE['userId']) ? $_COOKIE['userId'] : null;
            $orderId = isset($_GET['orderDate']) ? $_GET['orderDate'] : false;

            if (!isset($userId)) {
                echo "<h1>No user was selected, no orders to show</h1>";
            } else {
                $usernameQuery = "SELECT username
                             FROM users
                             WHERE id =" . $userId;
                $datesQuery = "SELECT order_id, order_date
                               FROM orders
                               WHERE user_id = " . $userId;
                $orderQuery = "SELECT *
                               FROM orders
                               WHERE order_id = " . $orderId;

                $db = new SQLite3('lab_securing.db');
                $username = $db->query($usernameQuery)->fetchArray()[0];
                $dates = $db->query($datesQuery);

                echo '<h1 class="cover-heading">Welcome ' . $username . ' View Your Orders</h1>';
                ?>

                <form id="orderSelection" method="GET">
                    <label for="orderDate">Select your order: </label>
                    <select class="form-select" name="orderDate" id="orderDate">
                        <?php
                        while ($date = $dates->fetchArray()) {
                            echo '<option value="' . $date['order_id'] . '">' . $date['order_date'] . '</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" value="Get Details">
                </form>
                <?php

                if (isset($orderId)) {
                    $details = $db->query($orderQuery);
                    if ($row = $details->fetchArray(SQLITE3_ASSOC)) {
                        echo '<table class="table table-bordered">';
                        echo '<tr><th>Order ID</th><th>Order Date</th><th>Total Amount</th><th>Bank Account Number</th><th>User ID</th></tr>';
                        echo '<tr>';
                        echo '<td>' . $row['order_id'] . '</td>';
                        echo '<td>' . $row['order_date'] . '</td>';
                        echo '<td>' . $row['total_amount'] . '</td>';
                        echo '<td>' . $row['bank_account_number'] . '</td>';
                        echo '<td>' . $row['user_id'] . '</td>';
                        echo '</tr>';
                        echo '</table>';
                    } else {
                        echo 'Order not found.';
                    }
                }
            }
            $db->close();
            ?>
        </div>
</body>
</html>