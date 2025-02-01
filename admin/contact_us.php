<?php
// Include database connection
include 'db.php';

// Initialize session and check if the admin is logged in
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Delete message if delete button is clicked
if (isset($_GET['delete'])) {
    $message_id = $_GET['delete'];

    // Delete message from the database
    $sql = "DELETE FROM contacts WHERE id = $message_id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Message deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting message: " . $conn->error . "</div>";
    }
}

// Fetch all messages from the database
$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Contact Messages</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .alert {
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #007bff;
            color: #fff;
        }
        table td {
            background-color: #f9f9f9;
        }
        table td a {
            text-decoration: none;
            color: #fff;
            background-color: #dc3545;
            padding: 6px 12px;
            border-radius: 4px;
        }
        table td a:hover {
            background-color: #c82333;
        }
        .no-records {
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Contact Messages</h1>

        <?php
        // Display success or error messages for deletion
        if (isset($_GET['delete'])) {
            echo "<div class='alert alert-success'>Message deleted successfully!</div>";
        }
        ?>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display messages in a table
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['phone_number'] . "</td>
                                <td>" . $row['location'] . "</td>
                                <td><a href='contact_us.php?delete=" . $row['id'] . "'>Delete</a></td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='no-records'>No messages found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
