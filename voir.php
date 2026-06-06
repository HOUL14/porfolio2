<?php
require_once __DIR__ . '/../../admin/inc.php';
require_admin_login();

$id = (int) ($_GET['id'] ?? 0);
$stmt = $pdo->prepare('SELECT * FROM demandes_projet WHERE id = :id');
$stmt->execute([':id' => $id]);
$demande = $stmt->fetch();

if (!$demande) {
    redirect('index.php');
}

if ($demande['lu'] == 0) {
    $stmt = $pdo->prepare('UPDATE demandes_projet SET lu = 1 WHERE id = :id');
    $stmt->execute([':id' => $id]);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Demande de projet</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header class="admin-header">
        <div class="container">
            <h1>Demande de projet</h1>
            <nav class="admin-nav">
                <a href="index.php">Retour</a>
                <a href="../dashboard.php">Dashboard</a>
                <a href="../deconnexion.php">Déconnexion</a>
            </nav>
        </div>
    </header>
    <main class="admin-container">
        <section class="admin-section">
            <h2>De <?= escape($demande['nom']) ?></h2>
            <p><strong>Email :</strong> <?= escape($demande['email']) ?></p>
            <p><strong>Type de projet :</strong> <?= escape($demande['type_projet']) ?></p>
            <p><strong>Budget :</strong> <?= escape($demande['budget'] ?? 'Non renseigné') ?></p>
            <p><strong>Date :</strong> <?= escape($demande['date_demande']) ?></p>
            <div class="admin-message-body">
                <?= nl2br(escape($demande['description'])) ?>
            </div>
        </section>
    </main>
</body>
</html>
