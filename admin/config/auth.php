<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function checkLogin() {
    if (!isset($_SESSION['admin_id'])) {
        header('Location: ../auth/login.php');
        exit;
    }
}

function getLoggedInUser($conn) {
    if (isset($_SESSION['admin_id'])) {
        $stmt = $conn->prepare("SELECT id, username FROM admins WHERE id = ?");
        $stmt->bind_param("i", $_SESSION['admin_id']);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    return null;
}

function isLoggedIn() {
    return isset($_SESSION['admin_id']);
}

function logout() {
    session_start();
    session_destroy();
    header('Location: ../auth/login.php');
    exit;
}