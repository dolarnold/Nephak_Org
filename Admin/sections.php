<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

include 'includes/db.php';

$section = $_GET['section'] ?? 'about_us';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    $stmt = $pdo->prepare("INSERT INTO sections (section_name, content) VALUES (?, ?) ON DUPLICATE KEY UPDATE content = ?");
    $stmt->execute([$section, $content, $content]);
    $message = "Section updated successfully!";
}

$stmt = $pdo->prepare("SELECT content FROM sections WHERE section_name = ?");
$stmt->execute([$section]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$content = $row['content'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage <?php echo ucwords(str_replace('_', ' ', $section)); ?></title>
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
</head>
<body>
    <div class="container">
        <h1>Manage <?php echo ucwords(str_replace('_', ' ', $section)); ?></h1>
        <?php if (isset($message)) echo "<p style='color:green;'>$message</p>"; ?>
        <form method="POST">
            <textarea name="content" rows="10" cols="50"><?php echo htmlspecialchars($content); ?></textarea><br>
            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>