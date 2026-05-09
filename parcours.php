<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houleye Tall | Parcours</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>


<?php require __DIR__ . '/portfolio/composant/navigation.php'; ?>

<main>
    <div class="container">
        <section>
            <h1 class="section-title">🎓 Mon parcours scolaire</h1>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="date">2007 - 2010</div>
                    <h3>🌸 Maternelle</h3>
                    <p>Notre Dame des Savoirs</p>
                </div>
                <div class="timeline-item">
                    <div class="date">2011 - 2016</div>
                    <h3>📚 Primaire</h3>
                    <p>Notre Dame des Savoirs </p>
                    <p>Obtention de mon premier diplôme (CFEE) en 2016</p>
                </div>
                <div class="timeline-item">
                    <div class="date">2017 - 2020</div>
                    <h3>🏫 Collège</h3>
                    <p>Abdou Latif Gueye</p>
                    <p>Obtention de mon diplôme du brevet en 2020</p>
                </div>
                <div class="timeline-item">
                    <div class="date">2021 - 2024</div>
                    <h3>🎓 Lycée</h3>
                    <p>Abdou Latif Gueye</p>
                    <p>Obtention de mon diplôme du baccalauréat en 2024</p>
                </div>
                <div class="timeline-item active">
                    <div class="date">2024 - présent</div>
                    <h3>💻 Licence 2 Génie Logiciel</h3>
                    <p>ESTM - Administration & Réseaux</p>
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