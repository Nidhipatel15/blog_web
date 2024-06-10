<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
if (!isset($_SESSION['author_id'])) {
    header("Location: login.php");
    exit;
}
$user_id = $_SESSION['author_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Blog Post">
    <meta name="description" content="Detailed blog post page">
    <title>Blog Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .featured-image {
            max-width: 100%;
            height: auto;
        }
        .excerpt {
            font-style: italic;
            color: #666;
        }
        .content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $query = "SELECT title, content, author_id, created_at, excerpt, featured_image, meta_title, meta_description, status 
                  FROM blog_posts 
                  WHERE author_id = $user_id AND status = 'published' 
                  ORDER BY created_at DESC 
                  LIMIT 1";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $blogPost = $result->fetch_assoc();
            ?>
            <h1><?php echo htmlspecialchars($blogPost['title']); ?></h1>
            <p class="excerpt"><?php echo htmlspecialchars($blogPost['excerpt']); ?></p>
            <?php if (!empty($blogPost['featured_image'])): ?>
                <img src="<?php echo htmlspecialchars($blogPost['featured_image']); ?>" alt="Featured Image" class="featured-image">
            <?php endif; ?>
            <p><small>Published on <?php echo date('F j, Y', strtotime($blogPost['created_at'])); ?></small></p>
            <div class="content">
                <?php echo nl2br(htmlspecialchars($blogPost['content'])); ?>
            </div>
            <?php
        } else {
            echo "<p>No published blog posts found for this user.</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
