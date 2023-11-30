<?php

require 'includes/_database.php';
session_start();

$userId = $_GET['userId'];

$query = $dbCo->prepare("SELECT PROGRAM_ID, type FROM PROGRAM WHERE USERS_ID = :userId");
$query->execute([':userId' => $userId]);
$programs = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($programs) > 0) {
    foreach ($programs as $program) {
        $html = '<li class="program-name" data-program-id="' . $program['PROGRAM_ID'] . '">' . $program['type'] . '</li>';
    }
} else {
    $html = '<li>' . 'This user has no associated program' . '</li>';
}
echo $html;
