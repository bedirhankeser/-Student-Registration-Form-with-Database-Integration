
<?php
// Validate form data
$errors = [];
if (empty($_POST['fullname'])) {
    $errors[] = "Full name is required.";
}
if (empty($_POST['email'])) {
    $errors[] = "Email address is required.";
}
if (empty($_POST['gender'])) {
    $errors[] = "Gender is required.";
}

if (count($errors) > 0) {
    // Display error messages
    echo "<h1>Error!</h1>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
} else {
    // Connect to the database
    $servername = "your_servername";
    $username = "your_username";
    $password = "your_password";
    $database = "your_database";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO students (full_name, email, gender) VALUES ('$fullname', '$email', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>Success!</h1>";
        echo "<p>Data successfully inserted into the database.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


