<?php
include('dbconnect.php');

// Initialize variables for error handling
$order_id = $order_amount = $order_date = "";
$order_id_error = $order_amount_error = $order_date_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Order ID
    if (empty($_POST['order_id'])) {
        $order_id_error = "Order ID is required.";
    } else {
        $order_id = $_POST['order_id'];
    }

    // Validate Order Amount
    if (empty($_POST['order_amount'])) {
        $order_amount_error = "Order Amount is required.";
    } else {
        $order_amount = $_POST['order_amount'];
    }

    // Validate Order Date
    if (empty($_POST['order_date'])) {
        $order_date_error = "Order Date is required.";
    } else {
        $order_date = $_POST['order_date'];
    }

    if (empty($order_id_error) && empty($order_amount_error) && empty($order_date_error)) {
        $sql = "INSERT INTO data (order_id, order_amount, order_date) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sds", $order_id, $order_amount, $order_date);

        if ($stmt->execute()) {
            header("Location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Order</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .custom-form {
            max-width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<?php include('navibar.html'); ?> <!-- Include the navbar -->


    <div class="container mt-5">
        <h2 class="text-center">Add Order</h2>
        <br><br>
        <form method="POST" class="custom-form">
            <div class="form-group">
                <label for="order_id">Order ID:</label>
                <input type="text" name="order_id" class="form-control <?php echo !empty($order_id_error) ? 'is-invalid' : ''; ?>" value="<?php echo $order_id; ?>" required>
                <div class="invalid-feedback"><?php echo $order_id_error; ?></div>
            </div>
            <div class="form-group">
                <label for="order_amount">Order Amount:</label>
                <input type="number" step="0.01" name="order_amount" class="form-control <?php echo !empty($order_amount_error) ? 'is-invalid' : ''; ?>" value="<?php echo $order_amount; ?>" required>
                <div class="invalid-feedback"><?php echo $order_amount_error; ?></div>
            </div>
            <div class="form-group">
                <label for="order_date">Order Date:</label>
                <input type="date" name="order_date" class="form-control <?php echo !empty($order_date_error) ? 'is-invalid' : ''; ?>" value="<?php echo $order_date; ?>" required>
                <div class="invalid-feedback"><?php echo $order_date_error; ?></div>
            </div>
            <div class="form-group text-right">
            <input type="submit" class="btn btn-primary" value="Add">
        </div>
        </form>
    </div>

    <?php include('footer.html'); ?> <!-- Include the footer -->
    
    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
