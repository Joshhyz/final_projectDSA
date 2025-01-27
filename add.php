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
    <form name="registrationForm" action="addAction.php" method="POST" class="form" onsubmit="return validateForm()">
        <div class="input-box">
            <label>Student ID</label>
            <input class="entry" type="text" name="studentID" placeholder="20XX-XXXXX-MN-0">
            <label>Full Name</label>
            <input class="entry" type="text" name="name" placeholder="ex: Juan Dela Cruz">
            <label>Email</label>
            <input class="entry" type="email" name="email" placeholder="ex: juandelacruz@mail.com">
            <label>Contact</label>
            <input class="entry" type="text" name="contact" placeholder="09XXXXXXXXX">
        </div>
        <div class="buttons">
            <button class="submit" type="submit">Submit</button>
            <button class="cancel" type="button" 
            onclick="window.location.href='index.php';">Cancel</button>
        </div>   
    </form>
</section>
</body>
</html>
