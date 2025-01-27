@ -1,58 +0,0 @@
<html>
<head>
	<title>Add Data</title>
</head>
<body>
<?php

// Include the database connection file
require_once("dbConnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Escape special characters in string for use in SQL statement	
	$id = uniqid(); // Generate a unique ID
	$studentID = mysqli_real_escape_string($mysqli, $_POST['studentID']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	
	// NEED TO DEBUG 
	// Check for empty fields
	if (empty($studentID) || empty($name) || empty($age) || empty($email)) {

		if (empty($studentID)) {
			echo "<font color='red'>Student Id field is empty.</font><br/>";
		}
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if (empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// Email validation
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "<font color='red'>Invalid email format.</font><br/>";
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else {
			// Prepared statement for safer database interaction
			$stmt = $mysqli->prepare("INSERT INTO users (`id`, `studentID`, `name`, `age`, `email`) VALUES (?, ?, ?, ?, ?)");
			$stmt->bind_param("sssis", $id, $studentID, $name, $age, $email);
			
			if ($stmt->execute()) {
				// Display success message
				echo "<p><font color='green'>Data added successfully!</p>";
				echo "<a href='index.php'>View Result</a>";
			} else {
				// Error handling
				echo "<font color='red'>Error: " . $stmt->error . "</font><br/>";
			}
			$stmt->close();
		}
	}
}
?>
</body>
</html>