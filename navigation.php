<?php $page_courante = basename($_SERVER['PHP_SELF']); ?>
<header>
    <div class="container">
        <nav>
            <div class="logo">🌸 HT</div>
            <ul class="nav-links">
                <li><a href="index.php" <?= $page_courante === 'index.php' ? 'class="active"' : '' ?>>Accueil</a></li>
                <li><a href="competences.php" <?= $page_courante === 'competences.php' ? 'class="active"' : '' ?>>Compétences</a></li>
                <li><a href="Projets.php" <?= $page_courante === 'Projets.php' ? 'class="active"' : '' ?>>Projets</a></li>
                <li><a href="parcours.php" <?= $page_courante === 'parcours.php' ? 'class="active"' : '' ?>>Parcours</a></li>
                <li><a href="contact.php" <?= $page_courante === 'contact.php' ? 'class="active"' : '' ?>>Contact</a></li>
            </ul>
            <button class="theme-toggle" id="themeToggle">🌙 Mode sombre</button>
        </nav>
    </div>
</header>