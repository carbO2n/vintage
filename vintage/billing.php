<?php
include 'vintage_db.php';
include 'navbar.php'; 

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Page</title>
    <link rel="stylesheet" href="css/bill.css">
</head>
<body>
    

    <div class="container">
        <h2>Billing</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Method</th>
                    <th>Province</th>
                    <th>City</th>
                    <th>Barangay</th>
                    <th>Street</th>
                    <th>Total Products</th>
                    <th>Total Price</th>
                    <th>Order Status</th>
                    <th>Payment Status</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM orders";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['phone_number']}</td>";
                        echo "<td>{$row['method']}</td>";
                        echo "<td>{$row['province']}</td>";
                        echo "<td>{$row['city']}</td>";
                        echo "<td>{$row['barangay']}</td>";
                        echo "<td>{$row['street']}</td>";
                        echo "<td>{$row['total_products']}</td>";
                        echo "<td>{$row['total_price']}</td>";
                        echo "<td>{$row['order_status']}</td>";
                        echo "<td>{$row['payment_status']}</td>";
                        echo "<td>{$row['order_date']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='13'>No orders found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
