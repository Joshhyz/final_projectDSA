<?php
// Include the database connection file
require_once("dbConnection.php");

// Records per page
$records_per_page = 5;

// Get the current page or set it to 1 if not provided
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($current_page < 1) $current_page = 1;
$start_from = ($current_page - 1) * $records_per_page;

// Fetch data in ascending order
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id ASC LIMIT $start_from, $records_per_page");
$all_data = mysqli_query($mysqli, "SELECT COUNT(*) FROM users");
$count = mysqli_fetch_row($all_data);
$total_records = $count[0]; // Total number of records
$total_pages = ceil($total_records / $records_per_page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #000; color: #fff; font-family: Arial, sans-serif; }
        header { background: #ff7613; color: #fff; text-align: center; padding: 20px; }
        table, th, td { color: #fff; border: 1px solid #444; text-align: center; }
        thead th { background: #ff7613; color: #000; }
        .btn { background: #ff7613; border: none; color: #000; }
        .btn-danger { background: #ff4c4c; color: #fff; }
        .btn:hover { opacity: 0.8; }
        .action-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        .pagination { justify-content: center; display: flex; align-items: center; margin-top: 10px; }
        .pagination span { margin: 0 15px; color: #ff7613; }
    </style>
</head>
<body>
    <header>
        <h1>Student Table</h1>
    </header>


    <div class="container mt-4">
        <div class="action-row">
            <p>Total Records: <?php echo $total_records; ?></p>
            <a href="edit.php" class="btn">Add New Data</a>
        </div>

        <!-- Table -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="text-center"><?php echo $row['id']; ?></td>
                        <td class="text-center"><?php echo $row['studentID']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td class="text-center">
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            <button class="btn" onclick="location.href='?page=<?php echo max(1, $current_page - 1); ?>'">Previous</button>
            <span>Page <?php echo $current_page; ?> of <?php echo $total_pages; ?></span>
            <button class="btn" onclick="location.href='?page=<?php echo min($total_pages, $current_page + 1); ?>'">Next</button>
        </div>
    </div>
</body>
</html>
