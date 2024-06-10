<!DOCTYPE html>
<html>
<head>
    <title>Blog Web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:grey;
            margin: 0;
            padding: 0;
        }
        
        header {
            width: 100%;
            background: #333;
            color: #fff;
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000; 
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }
        
        header .nav-buttons {
            display: flex;
            gap: 10px;
            padding-right: 40px;
        }

        header .nav-buttons button {
            background: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        header .nav-buttons button:hover {
            background: #218838;
        }

        .container {
            padding: 80px 20px 20px; 
            max-width: 800px;
            margin: 0 auto;
        }

        .post {
            background: #fff;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .post img {
            max-width: 50%;
            height: auto;
            border-radius: 8px;
        }

        .post h2 {
            margin-top: 0;
        }

        .meta {
            color: #555;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .excerpt {
            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            gap: 10px;
        }  
    </style>
</head>
<body>
    <header>
        <h1>Welcome Page</h1>
        <div class="nav-buttons">
            <button onclick="location.href='signup.html'">Signup</button>
            <button onclick="location.href='login.html'">Login</button>
        </div>
    </header>
    <div class="container">
        <h1>Blogs</h1>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "blog_web";

        $conn = new mysqli($servername, $username, $password, $dbname);

      
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, title, content, author_id, created_at, excerpt, featured_image, meta_title, meta_description FROM blog_posts WHERE status = 'published' ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='post'>";
                if (!empty($row['featured_image'])) {
                    echo "<img src='" . htmlspecialchars($row['featured_image']) . "' alt='Featured Image'>";
                }
                echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
                echo "<div class='meta'>Posted by Author ID: " . htmlspecialchars($row['author_id']) . " on " . htmlspecialchars($row['created_at']) . "</div>";
                echo "<div class='excerpt'>" . nl2br(htmlspecialchars($row['excerpt'])) . "</div>";
                echo "<div class='actions'>";
               
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No blog posts found.</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
