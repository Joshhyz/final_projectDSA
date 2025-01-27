<?php
// Include the database connection file
require_once("dbConnection.php");

// Records per page
$records_per_page = 10;

// Get the current page or set it to 1 if not provided
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_from = ($current_page - 1) * $records_per_page;
// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id ASC LIMIT $start_from, $records_per_page");
$all_data = mysqli_query($mysqli, "SELECT COUNT(*) FROM users");
$count = mysqli_fetch_row($all_data);
$total_records = $count[0]; // Total number of records

$total_pages = ceil($total_records / $records_per_page);

	
?>




<html>
<head>	
	<link rel="stylesheet" href="IndexDesign.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


	
</head>

<body>

		<h1 class="heading"> Student Table</h1>

		<button> <a href="edit.php" class="addbut" >Add New Data</a></button>
		<p>Total Records: <?php echo $total_records; ?></p>
		
		<!--TABLE-->
		<table class="infos">
			<tr>
				<td><strong>ID</strong></td>
				<td><strong>Student ID</strong></td>
				<td><strong>Name</strong></td>
				<td><strong>Email</strong></td>
				<td><strong>Contact</strong></td>
				<td><strong>Action</strong></td>
			</tr>
	<?php
		// Fetch the next row of a result set as an associative array
		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['studentID']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['contact']."</td>";
			echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | 
			<a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></tr>";
		}
		$_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && 
   		    mysqli_query($mysqli, "UPDATE users SET 
    
       			 studentID = '{$_POST['studentID']}', 
        		name = '{$_POST['name']}', 
        		email = '{$_POST['email']}', 
       			contact = '{$_POST['contact']}' 
       			WHERE id = $id");
        		$_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && 
        		header("Location: index.php") && exit();

		$_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel']) && 
   		    header("Location: index.php") && exit();

	?>
	</table>
	
	<!--PAGINATION--> 
		 <nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
			<li class="page-item<?php if ($current_page == 1) echo ' disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $current_page - 1; ?>">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item<?php if ($i == $current_page) echo ' active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item<?php if ($current_page == $total_pages) echo ' disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Next</a>
            </li>
        </ul>
    </nav>
	</body>
</html>	