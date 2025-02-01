<?php
// Include database connection
include('db.php');

// Handle form submission for adding an admin
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_admin'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Check if the username already exists
        $sql_check = "SELECT COUNT(*) FROM admins WHERE username = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("s", $username);
        $stmt_check->execute();
        $stmt_check->bind_result($count);
        $stmt_check->fetch();
        $stmt_check->close();

        if ($count > 0) {
            echo "<div class='confirmation'>Error: Username already exists. Please choose another one.</div>";
        } else {
            // Insert the new admin if the username does not exist
            $sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $password);

            if ($stmt->execute()) {
                echo "<div class='success'>Admin added successfully!</div>";
            } else {
                echo "<div class='confirmation'>Error adding admin: " . $stmt->error . "</div>";
            }
        }
    }

    // Handle form submission for editing an admin
    if (isset($_POST['edit_admin'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

        if ($password) {
            $sql = "UPDATE admins SET username=?, password=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $username, $password, $id);
        } else {
            $sql = "UPDATE admins SET username=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $username, $id);
        }

        if ($stmt->execute()) {
            echo "<div class='success'>Admin updated successfully!</div>";
        } else {
            echo "<div class='confirmation'>Error updating admin: " . $stmt->error . "</div>";
        }
    }

    // Handle form submission for deleting an admin
    if (isset($_POST['delete_admin'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM admins WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "<div class='success'>Admin deleted successfully!</div>";
        } else {
            echo "<div class='confirmation'>Error deleting admin: " . $stmt->error . "</div>";
        }
    }
}

// Fetch all admins to display
$sql = "SELECT * FROM admins";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management</title>
    <style>
        /* General Body Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Container for the main content */
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        /* Heading Styles */
        h1 {
            color: #333;
            font-size: 28px;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Section Heading Styles */
        h2 {
            color: #444;
            font-size: 22px;
            margin-bottom: 10px;
        }

        /* Form Styles */
        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: inline-block;
            color: #555;
        }

        input[type="text"], input[type="password"], input[type="number"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Table Styles */
        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f7f7f7;
            color: #333;
        }

        table td {
            background-color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Button Styles for Table Actions */
        form input[type="submit"] {
            background-color: #28a745;
            margin: 0 5px;
        }

        form input[type="submit"]:hover {
            background-color: #218838;
        }

        form input[type="submit"]:nth-child(2) {
            background-color: #dc3545;
        }

        form input[type="submit"]:nth-child(2):hover {
            background-color: #c82333;
        }

        /* Miscellaneous Styles */
        hr {
            margin: 20px 0;
            border: 0;
            border-top: 1px solid #ddd;
        }

        .confirmation {
            color: red;
            font-size: 16px;
            font-weight: bold;
        }

        .success {
            color: green;
            font-size: 16px;
            font-weight: bold;
        }

        /* Add some space between sections */
        section {
            margin-bottom: 40px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            input[type="text"], input[type="password"], input[type="number"], input[type="email"] {
                width: 100%;
            }
        }
    </style>
    <script>
        // Function to show/hide the edit form for each admin
        function toggleEditForm(id) {
            var form = document.getElementById('edit-form-' + id);
            var button = document.getElementById('edit-button-' + id);
            
            // Toggle visibility of the form
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                button.innerHTML = 'Cancel';
            } else {
                form.style.display = 'none';
                button.innerHTML = 'Edit';
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Admin Management</h1>

        <!-- Form to add admin -->
        <h2>Add Admin</h2>
        <form method="POST">
            <div class="form-column">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" name="username" required><br>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" required><br>
                </div>
                <input type="submit" name="add_admin" value="Add Admin">
            </div>
        </form>

        <hr>

        <!-- Display all admins -->
        <h2>All Admins</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td>
                    <!-- Edit Admin Button -->
                    <button id="edit-button-<?php echo $row['id']; ?>" onclick="toggleEditForm(<?php echo $row['id']; ?>)">Edit</button>

                    <!-- Edit Admin Form -->
                    <form id="edit-form-<?php echo $row['id']; ?>" method="POST" style="display:none; margin-top: 10px;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" name="username" value="<?php echo $row['username']; ?>" required>
                        <input type="password" name="password" placeholder="New Password (Optional)">
                        <input type="submit" name="edit_admin" value="Save Changes">
                    </form>

                    <!-- Delete Admin Form -->
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" name="delete_admin" value="Delete" onclick="return confirm('Are you sure you want to delete this admin?');">
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
