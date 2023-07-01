<!DOCTYPE html>
<html>

<body>

    <?php

    // Include the database connection file.
    include('db_connection.php');

    // Get the name, email, and password from the POST request.
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password.
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email address already exists in the database.
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    // If the email address exists, display an error message.
    if ($result->num_rows > 0) {
        echo "The email address already exists.";
    } else {
        // Insert the new user into the database.
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
        $conn->query($sql);

        // Display a success message.
        echo "The user was created successfully.";
    }

    // Close the database connection.
    $conn->close();

    ?>

</body>

</html>