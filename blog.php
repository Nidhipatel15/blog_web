<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_web";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT id, title, content, author_id, created_at, updated_at, published_at, status, excerpt, featured_image, meta_title, meta_description FROM posts";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Title</th><th>Content</th><th>Author ID</th><th>Created At</th><th>Updated At</th><th>Published At</th><th>Status</th><th>Excerpt</th><th>Featured Image</th><th>Meta Title</th><th>Meta Description</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["content"] . "</td>";
        echo "<td>" . $row["author_id"] . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "<td>" . $row["updated_at"] . "</td>";
        echo "<td>" . $row["published_at"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>" . $row["excerpt"] . "</td>";
        echo "<td><img src='" . $row["featured_image"] . "' alt='Featured Image' width='100' height='100'></td>";
        echo "<td>" . $row["meta_title"] . "</td>";
        echo "<td>" . $row["meta_description"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    header("Location:index.php");
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
