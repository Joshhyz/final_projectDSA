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
	$studentID = mysqli_real_escape_string($mysqli, $_POST['studentID']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$address = mysqli_real_escape_string($mysqli, $_POST['address']); // Added missing address

	// Check for empty fields
	if (empty($studentID) || empty($name) || empty($email) || empty($contact)) {
		if (empty($studentID)) {
			echo "<font color='red'>Student Id field is empty.</font><br/>";
		}
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if (empty($contact)){
			echo "<font color='red'>Contact field is empty.</font><br/>";
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
			$stmt = $mysqli->prepare("INSERT INTO users (`studentID`, `name`, `email`, `contact`) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssssss", $studentID, $name, $email, $contact); // Removed id parameter as it's auto-increment

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
