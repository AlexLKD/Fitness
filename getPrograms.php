<?php

require 'includes/_database.php';
session_start();

$userId = $_GET['userId'];

$query = $dbCo->prepare("SELECT PROGRAM_ID, type FROM PROGRAM WHERE USERS_ID = :userId");
$query->execute([':userId' => $userId]);
$programs = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($programs) > 0) {
    $html = '<ul>';
    foreach ($programs as $program) {
        $html .= '<li>' . $program['type'] . '</li>';
    }
    $html .= '</ul>';
} else {
    $html = '<li>' . 'This user has no associated program' . '</li>';
}

echo $html;
