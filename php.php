<html>

</html>
<?php
// Database configuration
$host = 'localhost';
$username = 'your_username';
$password = 'your_password';
$database = 'your_database';

// Create a connection to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to securely hash the password
function hashPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

// Register a new user
function registerUser($username, $password)
{
    global $conn;

    $hashedPassword = hashPassword($password);

    // Insert the user details into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Authenticate a user
function authenticateUser($username, $password)
{
    global $conn;

    // Retrieve the hashed password from the database
    $sql = "SELECT password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            echo "Authentication successful!";
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}

// Example usage

// Register a new user
registerUser('john', 'password123');

// Authenticate a user
authenticateUser('john', 'password123');

// Close the database connection
mysqli_close($conn);
