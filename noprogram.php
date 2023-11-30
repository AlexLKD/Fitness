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
    $query = $dbCo->prepare("SELECT USERS_ID, first_name, last_name FROM users WHERE USERS_ID NOT IN (SELECT DISTINCT USERS_ID FROM program)");
    $query->execute();
    $usersWithoutProgram = $query->fetchAll();
    ?>
    <div class="user-list-container">
        <ul class="user-list">
            <?php foreach ($usersWithoutProgram as $user) : ?>
                <li class="user-name" data-user-id="<?= $user['USERS_ID'] ?>">
                    <?= $user['first_name'] . " " . $user['last_name'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <a href="index.php" class="btn-noprogram">Users with programs</a>
    <script src="JS/script.js"></script>
</body>

</html>