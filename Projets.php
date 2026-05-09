<?php
require __DIR__ . '/portfolio/composant/fonction.php';

$projets = [
    [
        'titre' => 'Poubelle Intelligente',
        'description' => 'Projet IoT utilisant ESP32 pour détecter le niveau de remplissage des poubelles et optimiser la collecte.',
        'technologies' => ['ESP32', 'C++', 'Capteurs', 'IoT'],
        'image' => 'Poubelle intelligent.jpg',
        'status' => 'Déjà réalisé',
        'categorie' => 'iot',
        'lien' => '#',
        'impact' => 'Réduction de 30% des coûts de collecte grâce à une optimisation des tournées.'
    ],
    [
        'titre' => 'Gestion de répertoire téléphonique',
        'description' => 'Application en langage C permettant d\'ajouter, supprimer, rechercher et afficher des contacts.',
        'technologies' => ['Langage C', 'Structure de données'],
        'image' => 'nsi_prem_projet1_2.webp',
        'status' => 'Déjà réalisé',
        'categorie' => 'c',
        'lien' => '#',
        'impact' => 'Gestion efficace de plus de 1000 contacts avec recherche instantanée.'
    ],
    [
        'titre' => 'EcoShop',
        'description' => 'Marketplace éco-responsable avec panier dynamique, filtre par catégories et paiement sécurisé.',
        'technologies' => ['HTML/CSS', 'JavaScript', 'PHP/MySQL'],
        'image' => 'ecoshop.svg',
        'status' => 'Déjà réalisé',
        'categorie' => 'web',
        'lien' => '#',
        'impact' => 'Plateforme e-commerce avec 50+ produits écologiques et interface utilisateur intuitive.'
    ],
    // Nouveau projet 1 : Backdoor Metasploit
    [
        'titre' => 'Simulation d\'attaque – Backdoor Metasploit',
        'description' => 'Mise en place d’une backdoor avec Metasploit sur une machine cible (environnement isolé). Analyse des étapes d’exploitation et contre-mesures.',
        'technologies' => ['Metasploit', 'Kali Linux', 'Payload', 'Meterpreter'],
        'image' => 'image2.png',
        'status' => 'Déjà réalisé',
        'categorie' => 'security',
        'lien' => '#',
        'impact' => 'Démonstration pédagogique des vulnérabilités et mise en place de mesures de protection.'
    ],
    // Nouveau projet 2 : Base de données
    [
        'titre' => 'Conception et optimisation d’une base de données',
        'description' => 'Modélisation relationnelle, création de schéma SQL, indexation, triggers et procédures stockées pour un système de gestion de ventes.',
        'technologies' => ['MySQL', 'SQL', 'Modélisation', 'Performance'],
        'image' => 'image3.png',
        'status' => 'Déjà réalisé',
        'categorie' => 'database',
        'lien' => '#',
        'impact' => 'Base de données optimisée gérant 10 000+ transactions avec temps de réponse < 100ms.'
    ],
    // Nouveau projet 3 : SquidGuard
    [
        'titre' => 'Filtrage web avec SquidGuard',
        'description' => 'Configuration minimale de SquidGuard pour bloquer des catégories de sites, gestion des listes noires et intégration avec Squid.',
        'technologies' => ['Squid', 'SquidGuard', 'Linux', 'Filtrage'],
        'image' => 'image4.png',
        'status' => 'Déjà réalisé',
        'categorie' => 'security',
        'lien' => '#',
        'impact' => 'Filtrage efficace de 90% des sites non autorisés sur un réseau de 50 utilisateurs.'
    ]
];

$mot_cle = nettoyer($_GET['q'] ?? '');
$categorie = nettoyer($_GET['categorie'] ?? 'all');

$resultats = array_filter($projets, function($projet) use ($mot_cle, $categorie) {
    $ok_categorie = ($categorie === 'all') || strpos($projet['categorie'], $categorie) !== false;
    $ok_recherche = ($mot_cle === '') || stripos($projet['titre'], $mot_cle) !== false || stripos($projet['description'], $mot_cle) !== false;
    return $ok_categorie && $ok_recherche;
});

$nombre = count($resultats);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houleye Tall | Projets</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require __DIR__ . '/portfolio/composant/navigation.php'; ?>
    
<main>
    <div class="container">
        <section>
            <h1 class="section-title">✨ Mes réalisations</h1>
            
            <div class="search-filters-wrapper">
                <div class="search-bar">
                    <i class="fas fa-search" style="position: absolute; margin-left: 1rem; margin-top: 1rem; color: #d946ef;"></i>
                    <form method="get" action="" style="margin:0;">
                        <input type="text" name="q" placeholder="Rechercher un projet..." value="<?= htmlspecialchars($mot_cle) ?>" style="width: 100%; padding: 0.75rem 1rem 0.75rem 2.8rem; border: 2px solid rgba(217,70,239,0.3); border-radius: 50px; background: rgba(255,255,255,0.05); color: inherit; font-family: inherit; font-size: 1rem;">
                    </form>
                </div>

                <div class="filters-container" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 0.6rem; margin: 1.5rem 0;">
                    <a href="?<?= http_build_query(array_merge($_GET, ['categorie'=>'all', 'q'=>$mot_cle])) ?>" class="filter-tag <?= $categorie === 'all' ? 'active' : '' ?>">🏷️ Tous</a>
                    <a href="?<?= http_build_query(array_merge($_GET, ['categorie'=>'iot', 'q'=>$mot_cle])) ?>" class="filter-tag <?= $categorie === 'iot' ? 'active' : '' ?>">📡 Objets connectés</a>
                    <a href="?<?= http_build_query(array_merge($_GET, ['categorie'=>'web', 'q'=>$mot_cle])) ?>" class="filter-tag <?= $categorie === 'web' ? 'active' : '' ?>">🌐 Applications web</a>
                    <a href="?<?= http_build_query(array_merge($_GET, ['categorie'=>'c', 'q'=>$mot_cle])) ?>" class="filter-tag <?= $categorie === 'c' ? 'active' : '' ?>">⚡ Langage C</a>
                    <a href="?<?= http_build_query(array_merge($_GET, ['categorie'=>'database', 'q'=>$mot_cle])) ?>" class="filter-tag <?= $categorie === 'database' ? 'active' : '' ?>">🗄️ Base de données</a>
                    <!-- Nouveau filtre sécurité -->
                    <a href="?<?= http_build_query(array_merge($_GET, ['categorie'=>'security', 'q'=>$mot_cle])) ?>" class="filter-tag <?= $categorie === 'security' ? 'active' : '' ?>">🔒 Sécurité offensive</a>
                </div>

                <div class="result-stats">
                    <i class="fas fa-layer-group"></i>
                    <span><?= $nombre ?></span> projet(s) dans mon portfolio
                </div>
            </div>

            <div class="projects-grid" id="projectsGrid">
                <?php if (empty($resultats)): ?>
                    <div style="text-align: center; padding: 3rem; width: 100%;">
                        <i class="fas fa-inbox" style="font-size: 3rem; color: #d946ef; opacity: 0.5;"></i>
                        <p style="margin-top: 1rem;">Aucun projet ne correspond à votre recherche 🔍</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($resultats as $projet): ?>
                        <div class="project-card">
                            <div class="project-img">
                                <img src="<?= htmlspecialchars($projet['image']) ?>" alt="<?= htmlspecialchars($projet['titre']) ?>">
                            </div>
                            <div class="project-info">
                                <h3><?= htmlspecialchars($projet['titre']) ?></h3>
                                <p><?= htmlspecialchars($projet['description']) ?></p>
                                <div class="project-impact">
                                    <strong>Impact :</strong> <?= htmlspecialchars($projet['impact']) ?>
                                </div>
                                <div class="project-tech">
                                    <?php foreach ($projet['technologies'] as $tech): ?>
                                        <span><?= htmlspecialchars($tech) ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="project-links">
                                    <a href="<?= htmlspecialchars($projet['lien']) ?>" class="btn-project" target="_blank">Voir le projet</a>
                                </div>
                                <div class="project-status status-<?= 
                                    $projet['status'] === 'Disponible' ? 'open' : ($projet['status'] === 'En développement' ? 'progress' : 'done')
                                ?>">
                                    <?php if ($projet['status'] === 'Disponible'): ?>
                                        <i class="fas fa-circle"></i> Disponible
                                    <?php elseif ($projet['status'] === 'En développement'): ?>
                                        <i class="fas fa-spinner fa-pulse"></i> En développement
                                    <?php else: ?>
                                        <i class="fas fa-check-circle"></i> Déjà réalisé
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </div>
</main>

<?php require __DIR__ . '/portfolio/composant/pied-de-page.php'; ?>

<script>
    const toggle = document.getElementById('themeToggle');
    if(toggle) {
        toggle.addEventListener('click', () => {
            document.body.classList.toggle('light-mode');
            toggle.textContent = document.body.classList.contains('light-mode') ? '☀️ Mode clair' : '🌙 Mode sombre';
        });
    }
</script>

<style>
    .filter-tag {
        background: rgba(217,70,239,0.15);
        padding: 0.4rem 1.2rem;
        border-radius: 30px;
        font-size: 0.85rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        border: 1px solid rgba(217,70,239,0.3);
        text-decoration: none;
        color: inherit;
        display: inline-block;
    }
    .filter-tag:hover {
        background: rgba(217,70,239,0.3);
        transform: translateY(-2px);
    }
    .filter-tag.active {
        background: linear-gradient(135deg, #d946ef, #c026d3);
        color: white;
        border-color: transparent;
    }
    .result-stats {
        text-align: center;
        margin: 1rem 0 1.5rem;
        font-size: 0.9rem;
        opacity: 0.8;
    }
    .result-stats i {
        color: #d946ef;
        margin-right: 0.4rem;
    }
    .project-status {
        margin-top: 0.75rem;
        font-size: 0.7rem;
        font-weight: 600;
        display: inline-block;
        padding: 0.2rem 0.8rem;
        border-radius: 20px;
    }
    .status-open {
        background: #4CAF50;
        color: white;
    }
    .status-progress {
        background: #ff9800;
        color: white;
    }
    .status-done {
        background: #2196F3;
        color: white;
    }
    .search-bar {
        position: relative;
        max-width: 400px;
        margin: 0 auto;
    }
    body.light-mode .filter-tag {
        background: rgba(217,70,239,0.1);
    }
    .project-img img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        display: block;
    }
    .project-impact {
        font-size: 0.9rem;
        color: #a855f7;
        margin: 0.5rem 0;
        font-weight: 500;
    }
    .project-links {
        margin: 0.75rem 0;
    }
    .btn-project {
        background: linear-gradient(135deg, #d946ef, #c026d3);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.2s ease;
        display: inline-block;
    }
    .btn-project:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(217,70,239,0.4);
    }
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
    }
</style>
</body>
</html>