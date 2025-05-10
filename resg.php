<?php
// Establish database connection
$conn = mysqli_connect('localhost', 'root', 'Akshu@1234', 'coffeshop');

// Check if connection is successful
if (!$conn) {
    die('Error connecting to the database: ' . mysqli_connect_error());
}

// Validate and sanitize input data
$firstName = isset($_POST['firstName']) ? mysqli_real_escape_string($conn, $_POST['firstName']) : '';
$lastName = isset($_POST['lastName']) ? mysqli_real_escape_string($conn, $_POST['lastName']) : '';
$email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
$username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';
$contact = isset($_POST['contact']) ? mysqli_real_escape_string($conn, $_POST['contact']) : '';

// Check if all required fields are filled
if (empty($firstName) || empty($lastName) || empty($email) || empty($username) || empty($password) || empty($contact)) {
    echo '
    <script>
        alert("Please fill all the fields.");
        window.location = "registration.html";
    </script>';
    exit; // Stop further execution
}


// Prepare and execute the INSERT statement
$insert = mysqli_query($conn, "INSERT INTO registration (firstName, lastName, email, username, password, contact) 
                               VALUES ('$firstName', '$lastName', '$email', '$username', '$password', '$contact')");

// Check if insertion was successful
if ($insert) {
    echo '
    <script>
        alert("Registration Successful!!!");
        window.location = "login.html";
    </script>';
} else {
    echo '
    <script>
        alert("Error: ' . mysqli_error($conn) . '");
        window.location = "registration.html";
    </script>';
}

?>
