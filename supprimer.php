<?php
require_once __DIR__ . '/../../config/connexion.php';
require_once __DIR__ . '/../../fonctions.php';
require_admin_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $token = $_POST['csrf_token'] ?? '';
    if (!verifier_csrf_token($token, 'delete_projet')) {
        $_SESSION['flash_error'] = 'Token CSRF invalide.';
        redirect('index.php');
    }

    // Récupérer l'image pour la supprimer du disque
    $stmt = $pdo->prepare('SELECT image FROM projets WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $projet = $stmt->fetch();
    if ($projet && $projet['image']) {
        $filepath = __DIR__ . '/../..' . $projet['image'];
        if (file_exists($filepath)) unlink($filepath);
    }

    $stmt = $pdo->prepare('DELETE FROM projets WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $_SESSION['flash_success'] = 'Projet supprimé.';
}
redirect('index.php');