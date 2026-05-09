<?php
require __DIR__ . '/portfolio/composant/fonction.php';

// Initialisation des variables
$erreurs_contact = [];
$succes_contact = false;
$contact_nom = '';
$contact_email = '';
$contact_objet = '';
$contact_message = '';

$erreurs_projet = [];
$succes_projet = false;
$projet_nom = '';
$projet_email = '';
$projet_type = '';
$projet_budget = '';
$projet_description = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formulaire 1 : contact
    if (isset($_POST['form_contact'])) {
        $contact_nom = nettoyer($_POST['contact_nom'] ?? '');
        $contact_email = nettoyer($_POST['contact_email'] ?? '');
        $contact_objet = nettoyer($_POST['contact_objet'] ?? '');
        $contact_message = nettoyer($_POST['contact_message'] ?? '');
        $contact_bot_trap = nettoyer($_POST['contact_bot_trap'] ?? '');

        if ($contact_bot_trap !== '') {
            $erreurs_contact['contact_bot_trap'] = 'Détection de spam.';
        }
        if (!champ_requis($contact_nom)) {
            $erreurs_contact['contact_nom'] = 'Le nom est obligatoire.';
        }
        if (!email_valide($contact_email)) {
            $erreurs_contact['contact_email'] = 'Email valide obligatoire.';
        }
        if (!champ_requis($contact_objet)) {
            $erreurs_contact['contact_objet'] = 'L\'objet est obligatoire.';
        }
        if (!champ_requis($contact_message)) {
            $erreurs_contact['contact_message'] = 'Le message ne peut pas être vide.';
        }

        if (empty($erreurs_contact)) {
            $succes_contact = true;
        }
    }

    // Formulaire 2 : demande de projet
    if (isset($_POST['form_projet'])) {
        $projet_nom = nettoyer($_POST['projet_nom'] ?? '');
        $projet_email = nettoyer($_POST['projet_email'] ?? '');
        $projet_type = nettoyer($_POST['projet_type'] ?? '');
        $projet_budget = nettoyer($_POST['projet_budget'] ?? '');
        $projet_description = nettoyer($_POST['projet_description'] ?? '');
        $projet_bot_trap = nettoyer($_POST['projet_bot_trap'] ?? '');

        if ($projet_bot_trap !== '') {
            $erreurs_projet['projet_bot_trap'] = 'Détection de spam.';
        }
        if (!champ_requis($projet_nom)) {
            $erreurs_projet['projet_nom'] = 'Nom obligatoire.';
        }
        if (!email_valide($projet_email)) {
            $erreurs_projet['projet_email'] = 'Email valide obligatoire.';
        }
        if (!champ_requis($projet_type)) {
            $erreurs_projet['projet_type'] = 'Type de projet obligatoire.';
        }
        if (!champ_requis($projet_description)) {
            $erreurs_projet['projet_description'] = 'Description du projet obligatoire.';
        }
        if (empty($erreurs_projet)) {
            $succes_projet = true;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houleye Tall | Contact</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require __DIR__ . '/portfolio/composant/navigation.php'; ?>

<main>
    <div class="container">
        <section>
            <h1 class="section-title">MES infos</h1>

            <!-- CARTE DES COORDONNÉES -->
            <div class="contact-info-card">
                <div class="contact-name">Houleye Tall</div>
                <div class="contact-details">
                    <a href="mailto:houleyetall655@gmail.com">
                        <i class="fas fa-envelope"></i>
                        <span>houleyetall655@gmail.com</span>
                    </a>
                    <a href="tel:+221784881866">
                        <i class="fas fa-phone-alt"></i>
                        <span>78 488 18 66</span>
                    </a>
                    <a href="https://github.com/HOUL14" target="_blank">
                        <i class="fab fa-github"></i>
                        <span>GitHub</span>
                    </a>
                </div>
                <p class="contact-note">Une idée, un projet ou simplement un message ? Je suis à votre écoute.</p>
            </div>

            <!-- ================================================ -->
            <!-- FORMULAIRE 1 : Contact (traité en PHP) -->
            <!-- ================================================ -->
            <div class="form-vertical">
                <h3><i class="fas fa-paper-plane"></i> Envoyez-moi un message</h3>
                <?php if ($succes_contact): ?>
                    <div class="success">✅ Message envoyé ! Je vous répondrai rapidement.</div>
                <?php endif; ?>
                <form method="post">
                    <input type="hidden" name="form_contact" value="1">
                    <div class="form-group honeypot">
                        <label for="contact_bot_trap">Ne pas remplir</label>
                        <input id="contact_bot_trap" type="text" name="contact_bot_trap" value="" autocomplete="off" tabindex="-1">
                    </div>
                    <div class="form-group">
                        <label for="contact_nom">Nom complet</label>
                        <input id="contact_nom" type="text" name="contact_nom" value="<?= htmlspecialchars($contact_nom) ?>" placeholder="Votre nom" autocomplete="name" required>
                        <?php if (isset($erreurs_contact['contact_nom'])): ?>
                            <div class="error" role="alert"><?= $erreurs_contact['contact_nom'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="contact_email">Email</label>
                        <input id="contact_email" type="email" name="contact_email" value="<?= htmlspecialchars($contact_email) ?>" placeholder="votre@email.com" autocomplete="email" required>
                        <?php if (isset($erreurs_contact['contact_email'])): ?>
                            <div class="error" role="alert"><?= $erreurs_contact['contact_email'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="contact_objet">Objet</label>
                        <input id="contact_objet" type="text" name="contact_objet" value="<?= htmlspecialchars($contact_objet) ?>" placeholder="Sujet de votre message" autocomplete="off" required>
                        <?php if (isset($erreurs_contact['contact_objet'])): ?>
                            <div class="error" role="alert"><?= $erreurs_contact['contact_objet'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="contact_message">Message</label>
                        <textarea id="contact_message" name="contact_message" rows="4" placeholder="Bonjour Houleye, ..." required><?= htmlspecialchars($contact_message) ?></textarea>
                        <?php if (isset($erreurs_contact['contact_message'])): ?>
                            <div class="error" role="alert"><?= $erreurs_contact['contact_message'] ?></div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn-submit">Envoyer <i class="fas fa-arrow-right"></i></button>
                </form>
            </div>

            <!-- ================================================ -->
            <!-- FORMULAIRE 2 : Demande de projet -->
            <!-- ================================================ -->
            <div class="form-vertical">
                <h3><i class="fas fa-rocket"></i> Demande de projet</h3>
                <?php if ($succes_projet): ?>
                    <div class="success">✅ Demande envoyée ! Je vous recontacte sous 48h.</div>
                <?php endif; ?>
                <form method="post">
                    <input type="hidden" name="form_projet" value="1">
                    <div class="form-group honeypot">
                        <label for="projet_bot_trap">Ne pas remplir</label>
                        <input id="projet_bot_trap" type="text" name="projet_bot_trap" value="" autocomplete="off" tabindex="-1">
                    </div>
                    <div class="form-group">
                        <label for="projet_nom">Nom complet</label>
                        <input id="projet_nom" type="text" name="projet_nom" value="<?= htmlspecialchars($projet_nom) ?>" placeholder="Votre nom" autocomplete="name" required>
                        <?php if (isset($erreurs_projet['projet_nom'])): ?>
                            <div class="error" role="alert"><?= $erreurs_projet['projet_nom'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="projet_email">Email</label>
                        <input id="projet_email" type="email" name="projet_email" value="<?= htmlspecialchars($projet_email) ?>" placeholder="votre@email.com" autocomplete="email" required>
                        <?php if (isset($erreurs_projet['projet_email'])): ?>
                            <div class="error" role="alert"><?= $erreurs_projet['projet_email'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="projet_type">Type de projet</label>
                        <select id="projet_type" name="projet_type" required>
                            <option value="">Sélectionnez</option>
                            <option value="site-vitrine" <?= $projet_type === 'site-vitrine' ? 'selected' : '' ?>>Site vitrine</option>
                            <option value="e-commerce" <?= $projet_type === 'e-commerce' ? 'selected' : '' ?>>E-commerce</option>
                            <option value="application" <?= $projet_type === 'application' ? 'selected' : '' ?>>Application web</option>
                            <option value="application-mobile" <?= $projet_type === 'application-mobile' ? 'selected' : '' ?>>Application mobile</option>
                            <option value="iot" <?= $projet_type === 'iot' ? 'selected' : '' ?>>IoT / Objet connecté</option>
                            <option value="autre" <?= $projet_type === 'autre' ? 'selected' : '' ?>>Autre</option>
                        </select>
                        <?php if (isset($erreurs_projet['projet_type'])): ?>
                            <div class="error" role="alert"><?= $erreurs_projet['projet_type'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="projet_budget">Budget estimé</label>
                        <input id="projet_budget" type="text" name="projet_budget" value="<?= htmlspecialchars($projet_budget) ?>" placeholder="Ex: 2000€ - 5000€" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="projet_description">Description du projet</label>
                        <textarea id="projet_description" name="projet_description" rows="4" placeholder="Décrivez votre besoin..." required><?= htmlspecialchars($projet_description) ?></textarea>
                        <?php if (isset($erreurs_projet['projet_description'])): ?>
                            <div class="error" role="alert"><?= $erreurs_projet['projet_description'] ?></div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn-submit">Envoyer la demande <i class="fas fa-arrow-right"></i></button>
                </form>
            </div>

            <!-- ================================================ -->
            <!-- FORMULAIRE 3 : Recherche de projets  -->
            <!-- ================================================ -->
            <div class="form-vertical">
                <h3><i class="fas fa-search"></i> Rechercher un projet</h3>
                <p style="text-align: center; margin-bottom: 1rem;">Trouvez un projet par mot-clé (ex: JavaScript, IoT)</p>
                <form method="get" action="projets.php">
                    <div class="form-group">
                        <label>Mots-clés</label>
                        <input type="text" name="q" placeholder="ex: ESP32, IoT, C++" required>
                    </div>
                    <button type="submit" class="btn-submit">Rechercher <i class="fas fa-arrow-right"></i></button>
                </form>
                <p class="info-note">💡 Saisissez un mot-clé pour filtrer les projets.</p>
            </div>

        </section>
    </div>
</main>

<?php require __DIR__ . '/portfolio/composant/pied-de-page.php'; ?>

<script>
    // Mode sombre/clair
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