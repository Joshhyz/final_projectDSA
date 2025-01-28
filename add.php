<?php
// Initialize error message variable
$error_message = "";

require_once("dbConnection.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Retrieve the form data
    $studentID = $_POST['studentID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    // Validate the form fields
    if (empty($studentID) || empty($name) || empty($email) || empty($contact)) {
        $error_message = "All fields are required. Please fill in all fields.";
    } else {
        // Proceed with form processing (e.g., insert into DB)
        $stmt = $mysqli->prepare("INSERT INTO users (studentID, name, email, contact) VALUES (?, ?, ?, ?)");
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Information</title>
    <link rel="stylesheet" href="input.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <section class="container">
        <header>Registration Form</header>
        <!-- Display error message if any -->
        <?php if ($error_message): ?>
            <div class="error-message" style="color: red;">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <form action="" method="POST" class="form">
            <div class="input-box">
                <label>Student ID</label>
                <input class="entry" type="text" name="studentID" placeholder="20XX-XXXXX-MN-0" value="<?php echo isset($studentID) ? $studentID : ''; ?>" required>
                
                <label>Full Name</label>
                <input class="entry" type="text" name="name" placeholder="ex: Juan Dela Cruz" value="<?php echo isset($name) ? $name : ''; ?>" required>
                
                <label>Email</label>
                <input class="entry" type="email" name="email" placeholder="ex: juandelacruz@mail.com" value="<?php echo isset($email) ? $email : ''; ?>" required>
                
                <label>Contact</label>
                <input class="entry" type="text" name="contact" placeholder="09XXXXXXXXX" value="<?php echo isset($contact) ? $contact : ''; ?>" required>
            </div>
            <div class="buttons">
                <button class="submit" type="submit" name="submit">Submit</button>
                <button class="cancel" type="button" onclick="window.location.href='index.php';">Cancel</button>
            </div>
        </form>
    </section>
</body>
</html>
