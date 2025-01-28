<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);


$id = $resultData['id'];
$studentID = $resultData['studentID'];
$name = $resultData['name'];
$email = $resultData['email'];
$contact = $resultData['contact'];


// Handle form submission
/*$_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && 
    mysqli_query($mysqli, "UPDATE users SET 
    
        studentID = '{$_POST['studentID']}', 
        name = '{$_POST['name']}', 
        email = '{$_POST['email']}', 
        contact = '{$_POST['contact']}' 
        WHERE id = $id");
        $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && 
        header("Location: index.php") && exit(); */

$_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel']) && 
    header("Location: index.php") && exit();


?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="input.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<section class="container">
        <header>Edit Data</header>
        <form action="editAction.php"method="POST" class="form">
            <div class="input-box">
                <label>ID</label>
                <input  class="entry" type="text" name="id" value="<?php echo $id; ?>" disabled="disabled">
                <label>Student ID</label>
                <input  class="entry" type="text" name="studentID" value="<?php echo $studentID; ?>" required>
                <label>Name</label>
                <input  class="entry" type="text" name="name" value="<?php echo $name; ?>" required>
                <label>Email</label>
                <input  class="entry" type="text" name="email" value="<?php echo $email; ?>" required>
                <label>Contact</label>
                <input  class="entry" type="text" name="contact" value="<?php echo $contact; ?>" required>
            </div>
            <div class="buttons">
             <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit "name=update class="submit">Submit</button>
                <button class="cancel" type="button" 
                onclick="window.location.href='index.php';">Cancel</button>
            </div>   
        </form>
    </section>
</body>
</html>

