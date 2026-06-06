<?php
require_once __DIR__ . '/inc.php';
require_admin_login();

$totalProjets = $pdo->query('SELECT COUNT(*) FROM projets')->fetchColumn();
$totalMessagesNonLus = $pdo->query('SELECT COUNT(*) FROM messages_contact WHERE lu = 0')->fetchColumn();
$totalDemandesNonLues = $pdo->query('SELECT COUNT(*) FROM demandes_projet WHERE lu = 0')->fetchColumn();

$visites = $pdo->query('SELECT adresse_ip, page, date_visite FROM visites ORDER BY date_visite DESC LIMIT 5')->fetchAll();
$dernieresDemandes = $pdo->query('SELECT id, nom, email, type_projet, date_demande, lu FROM demandes_projet ORDER BY date_demande DESC LIMIT 5')->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Dashboard</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header class="admin-header">
        <div class="container">
            <h1>Tableau de bord</h1>
            <nav class="admin-nav">
                <a href="dashboard.php">Dashboard</a>
                <a href="projets/index.php">Projets</a>
                <a href="utilisateurs/index.php">Administrateurs</a>
                <a href="messages/index.php">Messages</a>
                <a href="demandes/index.php">Demandes</a>
                <a href="deconnexion.php">Déconnexion</a>
            </nav>
        </div>
    </header>
    <main class="admin-container">
        <section class="admin-cards">
            <article class="admin-card-small">
                <h2>Projets publiés</h2>
                <p><?= escape((string)$totalProjets) ?></p>
            </article>
            <article class="admin-card-small">
                <h2>Messages non lus</h2>
                <p><?= escape((string)$totalMessagesNonLus) ?></p>
            </article>
            <article class="admin-card-small">
                <h2>Demandes non lues</h2>
                <p><?= escape((string)$totalDemandesNonLues) ?></p>
            </article>
        </section>

        <section class="admin-section">
            <h2>5 dernières visites</h2>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>IP</th>
                        <th>Page</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($visites as $visite): ?>
                        <tr>
                            <td><?= escape($visite['adresse_ip']) ?></td>
                            <td><?= escape($visite['page']) ?></td>
                            <td><?= escape($visite['date_visite']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section class="admin-section">
            <h2>5 dernières demandes de projet</h2>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Lu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dernieresDemandes as $demande): ?>
                        <tr class="<?= $demande['lu'] == 0 ? 'admin-row-unread' : '' ?>">
                            <td><?= escape($demande['nom']) ?></td>
                            <td><?= escape($demande['email']) ?></td>
                            <td><?= escape($demande['type_projet']) ?></td>
                            <td><?= escape($demande['date_demande']) ?></td>
                            <td><?= $demande['lu'] == 0 ? 'Non' : 'Oui' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
