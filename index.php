<?php
require_once __DIR__ . '/../../admin/inc.php';
require_admin_login();

$demandes = $pdo->query('SELECT id, nom, email, type_projet, lu, date_demande FROM demandes_projet ORDER BY date_demande DESC')->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Demandes de projet</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header class="admin-header">
        <div class="container">
            <h1>Demandes de projet</h1>
            <nav class="admin-nav">
                <a href="../dashboard.php">Dashboard</a>
                <a href="../projets/index.php">Projets</a>
                <a href="../utilisateurs/index.php">Administrateurs</a>
                <a href="../messages/index.php">Messages</a>
                <a href="index.php">Demandes</a>
                <a href="../deconnexion.php">Déconnexion</a>
            </nav>
        </div>
    </header>
    <main class="admin-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Lu</th>
                    <th>Voir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($demandes as $demande): ?>
                    <tr class="<?= $demande['lu'] == 0 ? 'admin-row-unread' : '' ?>">
                        <td><?= escape($demande['nom']) ?></td>
                        <td><?= escape($demande['email']) ?></td>
                        <td><?= escape($demande['type_projet']) ?></td>
                        <td><?= escape($demande['date_demande']) ?></td>
                        <td><?= $demande['lu'] == 0 ? 'Non' : 'Oui' ?></td>
                        <td><a href="voir.php?id=<?= (int)$demande['id'] ?>" class="btn-outline">Voir</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
