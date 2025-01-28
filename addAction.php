<html>
<head>
	<title>Add Data</title>
</head>
<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape special characters in strings for use in the SQL statement    
    $studentID = mysqli_real_escape_string($mysqli, $_POST['studentID']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $contact = mysqli_real_escape_string($mysqli, $_POST['contact']);
    
    // Check for empty fields
    if (empty($studentID) || empty($name) || empty($email) || empty($contact)) {
        if (empty($studentID)) {
            echo "<font color='red'>Student ID field is empty.</font><br/>";
        }
        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if (empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if (empty($contact)) {
            echo "<font color='red'>Contact field is empty.</font><br/>";
        }

        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // Email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<font color='red'>Invalid email format.</font><br/>";
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } else {
            // Prepared statement for safer database interaction
            $stmt = $mysqli->prepare("INSERT INTO users (`studentID`, `name`, `email`, `contact`) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $studentID, $name, $email, $contact);
            
            if ($stmt->execute()) {
                // Display success message
                echo "<p><font color='green'>Data added successfully!</font></p>";
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
