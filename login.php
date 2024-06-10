<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_web";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, password FROM authors WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
    
            $_SESSION['userid'] = $id;
            $_SESSION['username'] = $name;
            echo "Login successful. Welcome, " . $name . "!";
            header("Location: Welcome.html");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with that email.";
    }
    $stmt->close();
}
$conn->close();
