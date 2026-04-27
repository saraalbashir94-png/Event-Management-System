<?php 
require_once "../../config/db_connection.php";
$query = "SELECT * FROM user WHERE role = 'user'"; 
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Visitors List</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #fdfdfd; margin: 0; }
        .admin-container { max-width: 1100px; margin: 40px auto; padding: 20px; }
        h2 { color: #472480; margin-bottom: 25px; }
        .visitors-table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.05); border-radius: 10px; overflow: hidden; }
        .visitors-table th { background-color: #472480; color: white; padding: 15px; text-align: left; }
        .visitors-table td { padding: 12px 15px; border-bottom: 1px solid #eee; color: #333; }
        .cancel { color: red; border-radius: 10px; border: 1px red solid; background-color: transparent; padding: 5px 15px; text-decoration: none; font-size: 14px; cursor: pointer; display: inline-block; }
        .cancel:hover { background-color: red; color: white; }
    </style>
</head>
<body>
    <?php $navType = "admin"; include("../components/navbar.php"); ?>
    <div class="admin-container">
        <h2>Registered Visitors</h2>
        <table class="visitors-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td>#<?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone'] ?? 'N/A'; ?></td>
                    <td>
                        <a href="../../controllers/AdminVisitorsController.php?delete_id=<?php echo $row['id']; ?>" 
                           class="cancel" 
                           onclick="return confirm('Are you sure?')">Cancel</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php include("../components/footer.php"); ?>
</body>
</html>