<?php
// Establish database connection
$conn = mysqli_connect('localhost', 'root', 'Akshu@1234', 'coffeshop');

// Check if connection is successful
if (!$conn) {
    die('Error connecting to the database: ' . mysqli_connect_error());
}

// Validate and sanitize input data
$username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';

// Check if username and password are provided
if (empty($username) || empty($password)) {
    echo '
    <script>
        alert("Please enter both username and password.");
        window.location = "login.html";
    </script>';
    exit; // Stop further execution
}

// Query the database to check if the username and password match
$query = "SELECT * FROM registration WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Username and password match, redirect to index.html
    header("Location: index.html");
    exit; // Stop further execution
} else {
    // Username or password is incorrect
    echo '
    <script>
        alert("Incorrect username or password.");
        window.location = "login.html";
    </script>';
}

// Close the database connection
mysqli_close($conn);
?>
