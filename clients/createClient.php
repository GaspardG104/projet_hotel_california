// client/create.php
<?php
require_once '../config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $nombre_personnes = $_POST['nombre_personnes'];
    
    $conn = openDatabaseConnection();
    $stmt = $conn->prepare("INSERT INTO clients (nom, telephone, email, nombre_personnes) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $telephone, $email, $nombre_personnes]);
    closeDatabaseConnection($conn);
    
    header("Location: listClients.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ajouter un Client</title>
</head>
<body>
    <h1>Ajouter une Client</h1>
    <form method="post">
        <div>
            <label>Nom:</label>
            <input type="text" name="nom" required>
        </div>
        <div>
            <label>Téléphone:</label>
            <input type="number" name="telephone" required>
        </div>
        <div>
            <label>E-mail:</label>
            <input type="text" name="email" required>
        </div>
        <div>
            <label>Nombre personnes:</label>
            <input type="text" name="nombre_personnes" required>
        </div>
        <button type="submit">Enregistrer</button>
    </form>
    <a href="listClients.php">Retour à la liste de Clients</a>
</body>
</html>
