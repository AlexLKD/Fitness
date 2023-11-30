<?php
require 'includes/_database.php';
session_start();
require 'includes/header.php';
?>



<?php
$query = $dbCo->prepare("SELECT USERS_ID, first_name, last_name FROM users");
$query->execute();
$users = $query->fetchAll();
?>
<div class="lists">
    <div class="user-list-container">
        <ul class="user-list">
            <?php foreach ($users as $user) : ?>
                <li class="user-name" data-user-id="<?= $user['USERS_ID'] ?>">
                    <?= $user['first_name'] . " " . $user['last_name'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="program-list-container">
        <ul class="program-list"></ul>
    </div>
    <div class="workout-list-container">
        <ul class="workout-list"></ul>
    </div>
</div>
<script src="JS/script.js"></script>
</body>

</html>