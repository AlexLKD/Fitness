<?php
require 'includes/_database.php';
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>
</head>

<body>


    <?php
    $query = $dbCo->prepare("SELECT USERS_ID, first_name, last_name FROM users");
    $query->execute();
    $users = $query->fetchAll();
    ?>
    <div class="user-list-container">
        <ul class="user-list">
            <?php foreach ($users as $user) : ?>
                <li class="user-name" <?= $user['USERS_ID'] ?>>
                    <?= $user['first_name'] . " " . $user['last_name'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script src="script.js"></script>
</body>

</html>