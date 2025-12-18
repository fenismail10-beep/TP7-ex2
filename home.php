<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de mot de passe</title>
</head>
<body>
    <h1>Générateur de mot de passe</h1>
    <form method="POST" action="">
        <label for="length">Entrez la longueur du mot de passe :</label>
        <input type="number" id="length" name="length" min="4" max="32" required>
        <button type="submit">Générer</button>
    </form>

    <?php
    // Vérifier si le bouton "Générer" a été cliqué
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Fonction pour générer un mot de passe aléatoire
        function genererMotDePasse($longueur) {
            // Ensemble de caractères utilisés
            $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
            $motDePasse = '';

            // Générer la chaîne de caractères
            for ($i = 0; $i < $longueur; $i++) {
                $indexAleatoire = rand(0, strlen($caracteres) - 1);
                $motDePasse .= $caracteres[$indexAleatoire];
            }

            return $motDePasse;
        }

        // Récupérer la longueur entrée par l'utilisateur
        $longueurMotDePasse = (int) $_POST['length'];

        // Vérifier si la longueur est valide
        if ($longueurMotDePasse < 4) {
            echo "<p style='color: red;'>Erreur : La longueur doit être d'au moins 4 caractères.</p>";
        } else {
            // Générer et afficher le mot de passe
            $motDePasse = genererMotDePasse($longueurMotDePasse);
            echo "<p>Votre mot de passe : <strong>$motDePasse</strong></p>";
        }
    }
    ?>
</body>
</html>