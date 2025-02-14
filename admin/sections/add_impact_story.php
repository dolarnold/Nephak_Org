<?php
session_start();
require_once '../config/database.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $publication_date = $_POST['publication_date'];
    $slug = strtolower(str_replace(' ', '-', $title));

    // Handle image upload
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $image = $target_file;
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO impact_stories (title, content, image, publication_date, slug) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $content, $image, $publication_date, $slug);
    $stmt->execute();
    $stmt->close();
    echo "Impact story added successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Impact Story</title>
</head>
<body>
    <h1>Add Impact Story</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea><br><br>
        <label for="image">Image:</label>
        <input type="file" id="image" name="image"><br><br>
        <label for="publication_date">Publication Date:</label>
        <input type="date" id="publication_date" name="publication_date" required><br><br>
        <button type="submit">Add Story</button>
    </form>
</body>
</html>