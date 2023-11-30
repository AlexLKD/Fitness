<?php

require 'includes/_database.php';
session_start();

$programId = $_GET['programId'];

// Requête pour récupérer les workouts associés à ce programme
$query = $dbCo->prepare("SELECT WORKOUT_ID, name FROM WORKOUT WHERE PROGRAM_ID = :programId");
$query->execute([':programId' => $programId]);
$workouts = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($workouts) > 0) {
    $html = '<ul>';
    foreach ($workouts as $workout) {
        $html .= '<li class="workout-name">' . $workout['name'] . '</li>';
    }
    $html .= '</ul>';
} else {
    $html = '<li>' . 'This program has no associated workouts' . '</li>';
}
echo $html;
