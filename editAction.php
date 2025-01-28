<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
    // Escape special characters in a string for use in an SQL 
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $studentID = mysqli_real_escape_string($mysqli, $_POST['studentID']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $contact = mysqli_real_escape_string($mysqli, $_POST['contact']);

    // Check for empty fields
    if (empty($studentID) || empty($name)   || empty($email) || empty($contact)) {
        if (empty($studentID)) {
            echo "<font color='red'>studentID field is empty.</font><br/>";
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

        // Show link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // Update the database table
		$result = mysqli_query($mysqli, "UPDATE users SET `studentID` = '$studentID', `name` = '$name', `email` = '$email', `contact` = '$contact' WHERE `id` = '$id'");

        // Display success message
        echo "<p><font color='green'>Data updated successfully!</p>";
        echo "<a href='index.php'>View Result</a>";
    }
}
?>