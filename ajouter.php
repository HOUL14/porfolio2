<?php
require_once __DIR__ . '/../../admin/inc.php';
require_admin_login();

$erreurs = [];
$titre = '';
$description = '';
$technologies = '';
$lien = '';
$imagePath = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = trim($_POST['titre'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $technologies = trim($_POST['technologies'] ?? '');
    $lien = trim($_POST['lien'] ?? '');
    $csrfToken = $_POST['csrf_token'] ?? '';

    if (!verifier_csrf_token($csrfToken, 'ajouter_projet')) {
        $erreurs[] = 'Requête invalide.';
    }

    if (!champ_requis($titre)) {
        $erreurs[] = 'Le titre est obligatoire.';
    }
    if (!champ_requis($description)) {
        $erreurs[] = 'La description est obligatoire.';
    }
    if (!champ_requis($technologies)) {
        $erreurs[] = 'Les technologies sont obligatoires.';
    }

    if (!empty($_FILES['image']['name'])) {
        $imageInfo = pathinfo($_FILES['image']['name']);
        $extension = strtolower($imageInfo['extension'] ?? '');
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

        if (!in_array($extension, $allowed, true)) {
            $erreurs[] = 'Le format de l’image doit être jpg, jpeg, png, webp ou gif.';
        } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            $erreurs[] = 'Erreur lors de l’upload de l’image.';
        } else {
            $nomFichier = 'projet_' . time() . '_' . bin2hex(random_bytes(6)) . '.' . $extension;
            $destination = __DIR__ . '/../../images/projets/' . $nomFichier;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                $erreurs[] = 'Impossible d’enregistrer l’image.';
            } else {
                $imagePath = 'images/projets/' . $nomFichier;
            }
        }
    }

    if (empty($erreurs)) {
        $stmt = $pdo->prepare('INSERT INTO projets (titre, description, technologies, image, lien) VALUES (:titre, :description, :technologies, :image, :lien)');
        $stmt->execute([
            ':titre' => $titre,
            ':description' => $description,
            ':technologies' => $technologies,
            ':image' => $imagePath,
            ':lien' => $lien !== '' ? $lien : null,
        ]);
        redirect('index.php?ajout=1');
    }
}

$csrfToken = generer_csrf_token('ajouter_projet');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Ajouter un projet</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header class="admin-header">
        <div class="container">
            <h1>Ajouter un projet</h1>
            <nav class="admin-nav">
                <a href="index.php">Retour</a>
                <a href="../dashboard.php">Dashboard</a>
                <a href="../deconnexion.php">Déconnexion</a>
            </nav>
        </div>
    </header>
    <main class="admin-container">
        <?php if (!empty($erreurs)): ?>
            <div class="error">
                <ul>
                    <?php foreach ($erreurs as $erreur): ?>
                        <li><?= escape($erreur) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data" class="admin-form">
            <input type="hidden" name="csrf_token" value="<?= escape($csrfToken) ?>">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input id="titre" name="titre" value="<?= escape($titre) ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5" required><?= escape($description) ?></textarea>
            </div>
            <div class="form-group">
                <label for="technologies">Technologies (séparées par des virgules)</label>
                <input id="technologies" name="technologies" value="<?= escape($technologies) ?>" required>
            </div>
            <div class="form-group">
                <label for="lien">Lien externe (optionnel)</label>
                <input id="lien" name="lien" value="<?= escape($lien) ?>" placeholder="https://...">
            </div>
            <div class="form-group">
                <label for="image">Image (jpg, jpeg, png, webp ou gif)</label>
                <input id="image" type="file" name="image" accept="image/jpeg,image/png,image/webp,image/gif">
            </div>
            <button type="submit" class="btn-submit">Créer le projet</button>
        </form>
    </main>
</body>
</html>
