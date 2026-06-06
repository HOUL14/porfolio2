<?php
require_once __DIR__ . '/../config/connexion.php';
require_once __DIR__ . '/../fonctions.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function admin_current_name(): string {
    return $_SESSION['admin_prenom'] ?? '';
}
