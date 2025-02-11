<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
include 'includes/header.php';
?>
<div class="container">
    <h1>Admin Dashboard</h1>
    <ul>
        <li><a href="sections.php?section=about_us">About Us</a></li>
        <li><a href="sections.php?section=board">Board</a></li>
        <li><a href="sections.php?section=members">Members</a></li>
        <li><a href="sections.php?section=careers">Careers</a></li>
        <li><a href="sections.php?section=contact_us">Contact Us</a></li>
        <!-- Add more sections as needed -->
    </ul>
</div>
<?php include 'includes/footer.php'; ?>