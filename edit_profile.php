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

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];

    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE authors SET name = ?, email = ?, password = ?, gender = ? WHERE author_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $password, $gender, $user_id);
    } else {
        $sql = "UPDATE authors SET name = ?, email = ?, gender = ?,  WHERE author_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $email, $gender, $user_id);
    }

    if ($stmt->execute()) {
        echo "Profile updated successfully.";
        $_SESSION['user_name'] = $name; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
