<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$gender = $_POST['gender'];

$conn = new mysqli('localhost', 'root', '', 'blog_web');


if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
   
    $stmt = $conn->prepare("INSERT INTO authors (name, email, password, gender) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die('Prepare Failed: ' . $conn->error);
    }

    
    $stmt->bind_param("ssss", $name, $email, $password, $gender);

   
    if ($stmt->execute()) {
        echo "Create Account succesfully";
        header("Location: login.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
