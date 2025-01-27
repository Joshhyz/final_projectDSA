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
    <link rel="stylesheet" href="IndexDesign.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="text-center py-3 bg-warning">
        <h1 class="heading">Student Table</h1>
    </header>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="fw-bold">Total Records: <?php echo $total_records; ?></p>
            <button class="btn btn-primary">
                <a href="edit.php" class="text-white text-decoration-none">Add New Data</a>
            </button>
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
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item<?php if ($current_page == 1) echo ' disabled'; ?>">
                    <a class="page-link" href="?page=<?php echo max(1, $current_page - 1); ?>">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <li class="page-item<?php if ($i == $current_page) echo ' active'; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php } ?>
                <li class="page-item<?php if ($current_page == $total_pages) echo ' disabled'; ?>">
                    <a class="page-link" href="?page=<?php echo min($total_pages, $current_page + 1); ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
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
    <link rel="stylesheet" href="IndexDesign.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="text-center py-3 bg-warning">
        <h1 class="heading">Student Table</h1>
    </header>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="fw-bold">Total Records: <?php echo $total_records; ?></p>
            <button class="btn btn-primary">
                <a href="edit.php" class="text-white text-decoration-none">Add New Data</a>
            </button>
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
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item<?php if ($current_page == 1) echo ' disabled'; ?>">
                    <a class="page-link" href="?page=<?php echo max(1, $current_page - 1); ?>">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <li class="page-item<?php if ($i == $current_page) echo ' active'; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php } ?>
                <li class="page-item<?php if ($current_page == $total_pages) echo ' disabled'; ?>">
                    <a class="page-link" href="?page=<?php echo min($total_pages, $current_page + 1); ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
