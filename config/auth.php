<?php
session_start();

function checkLogin() {
    if (!isset($_SESSION['admin_id'])) {
        header('Location: ../auth/login.php');
        exit;
    }
}