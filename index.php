<?php
include('dbconnect.php');

$sql = "SELECT * FROM data";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>

<?php include('navibar.html'); ?> <!-- Include the navbar -->



    <div class="container mt-5">
        <h2 class="text-center">Order List</h2>
        <br>
    
        <a href="insert.php" class="btn btn-primary">Add Order</a>
        <br><br>
    
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Amount</th>
                    <th>Order Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['order_id']."</td>";
                        echo "<td>".$row['order_amount']."</td>";
                        echo "<td>".$row['order_date']."</td>";
                        echo "<td><a href='update.php?id=".$row['id']."' class='btn btn-info btn-sm'>Edit</a> | <a href='delete.php?id=".$row['id']."' class='btn btn-danger btn-sm'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No orders found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include('footer.html'); ?> <!-- Include the footer -->
    
    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
