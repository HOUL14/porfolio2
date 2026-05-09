<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houleye Tall | Compétences</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Style pour la section Qui suis-je ? */
        .about-section {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 3rem;
            background: rgba(255,255,255,0.03);
            border-radius: 30px;
            padding: 2rem;
            margin: 2rem 0;
        }
        body.light-mode .about-section {
            background: #f0e6ff;
        }
        .about-image {
            flex: 1;
            min-width: 200px;
            text-align: center;
        }
        .about-image img {
            width: 80%;
            max-width: 250px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .about-content {
            flex: 2;
        }
        .about-content h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #d946ef, #f0abfc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .about-content p {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        @media (max-width: 768px) {
            .about-section {
                flex-direction: column;
                text-align: center;
            }
        }
        /* Style pour la section compétences */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }
        .skill-category {
            background: rgba(255,255,255,0.05);
            border-radius: 20px;
            padding: 1.5rem;
            border: 1px solid rgba(217,70,239,0.2);
            transition: all 0.3s ease;
        }
        body.light-mode .skill-category {
            background: #f8f4ff;
            border-color: rgba(217,70,239,0.4);
        }
        .skill-category:hover {
            transform: translateY(-5px);
            border-color: #d946ef;
            background: rgba(255,255,255,0.08);
        }
        body.light-mode .skill-category:hover {
            background: #f0e6ff;
        }
        .skill-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(217,70,239,0.3);
        }
        .skill-icon {
            font-size: 2rem;
        }
        .skill-category h3 {
            color: #d946ef;
            font-size: 1.3rem;
            margin: 0;
        }
        .skill-category ul {
            list-style: none;
            padding: 0;
        }
        .skill-category li {
            padding: 0.75rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            transition: 0.2s;
        }
        body.light-mode .skill-category li {
            border-bottom-color: rgba(0,0,0,0.05);
        }
        .skill-category li:last-child {
            border-bottom: none;
        }
        .skill-category li:hover {
            padding-left: 0.5rem;
        }
        .skill-name {
            font-weight: 600;
            color: inherit;
        }
        .skill-badge {
            display: inline-block;
            padding: 0.35rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            white-space: nowrap;
        }
        .skill-badge.advanced {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.3), rgba(16, 185, 129, 0.2));
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.5);
        }
        .skill-badge.intermediate {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.3), rgba(96, 165, 250, 0.2));
            color: #3b82f6;
            border: 1px solid rgba(59, 130, 246, 0.5);
        }
        .skill-badge.beginner {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.3), rgba(251, 146, 60, 0.2));
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.5);
        }
        /* Style pour l'aperçu des projets */
        .projects-preview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }
        .project-preview-card {
            background: rgba(255,255,255,0.05);
            border-radius: 20px;
            overflow: hidden;
            transition: 0.3s;
            border: 1px solid rgba(217,70,239,0.2);
            text-align: center;
        }
        body.light-mode .project-preview-card {
            background: #f8f4ff;
            border-color: rgba(217,70,239,0.4);
        }
        .project-preview-card:hover {
            transform: translateY(-5px);
            border-color: #d946ef;
        }
        .project-preview-img {
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0,0,0,0.1);
        }
        .project-preview-img img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        .project-preview-card h3 {
            margin: 1rem 0 0.5rem;
            color: #d946ef;
            font-size: 1.2rem;
        }
        .project-preview-card p {
            padding: 0 1rem;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        .btn-preview {
            display: inline-block;
            background: linear-gradient(135deg, #d946ef, #c026d3);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 1rem;
            transition: all 0.2s ease;
        }
        .btn-preview:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(217,70,239,0.4);
        }
    </style>
</head>
<body>

<?php require __DIR__ . '/portfolio/composant/navigation.php'; ?>


<main>
    <div class="container">
        <section>
            <h1 class="section-title">🛠️ Mes compétences</h1>
            <div class="skills-grid">
                <div class="skill-category">
                    <div class="skill-header">
                        <span class="skill-icon">🌐</span>
                        <h3>Développement Web</h3>
                    </div>
                    <ul>
                        <li>
                            <span class="skill-name">HTML/CSS</span>
                            <span class="skill-badge advanced">Maîtrise avancée</span>
                        </li>
                        <li>
                            <span class="skill-name">JavaScript</span>
                            <span class="skill-badge intermediate">Bon niveau</span>
                        </li>
                        <li>
                            <span class="skill-name">PHP</span>
                            <span class="skill-badge beginner">Notions de base</span>
                        </li>
                    </ul>
                </div>
                <div class="skill-category">
                    <div class="skill-header">
                        <span class="skill-icon">⚡</span>
                        <h3>Programmation</h3>
                    </div>
                    <ul>
                        <li>
                            <span class="skill-name">Langage C</span>
                            <span class="skill-badge advanced">Maîtrise</span>
                        </li>
                        <li>
                            <span class="skill-name">Python</span>
                            <span class="skill-badge beginner">Notions</span>
                        </li>
                        <li>
                            <span class="skill-name">Arduino/ESP32</span>
                            <span class="skill-badge intermediate">Expérience IoT</span>
                        </li>
                    </ul>
                </div>
                <div class="skill-category">
                    <div class="skill-header">
                        <span class="skill-icon">🔒</span>
                        <h3>Sécurité & Réseaux</h3>
                    </div>
                    <ul>
                        <li>
                            <span class="skill-name">Metasploit/Kali Linux</span>
                            <span class="skill-badge intermediate">Bases</span>
                        </li>
                        <li>
                            <span class="skill-name">Squid/SquidGuard</span>
                            <span class="skill-badge intermediate">Configuration</span>
                        </li>
                        <li>
                            <span class="skill-name">Administration réseau</span>
                            <span class="skill-badge beginner">Connaissances</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section>
            <h2 class="section-title">📅 Ma progression</h2>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="date">2024</div>
                    <h3>Début du développement web</h3>
                    <p>Premiers pas avec HTML/CSS - Création de ma première page web.</p>
                </div>
                <div class="timeline-item">
                    <div class="date">2025/2026</div>
                    <h3>Apprentissage JavaScript & Programmation</h3>
                    <p>Maîtrise des bases de la programmation objet, DOM, et Langage C.</p>
                </div>
                <div class="timeline-item">
                    <div class="date">2026</div>
                    <h3>Développement complet & Sécurité</h3>
                    <p>Projets web complets, IoT, sécurité informatique et administration réseau.</p>
                </div>
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
</body>
</html>