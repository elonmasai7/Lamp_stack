<?php
require_once __DIR__ . '/../includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judge_id = (int)$_POST['judge_id'];
    $user_id = (int)$_POST['user_id'];
    $points = (int)$_POST['points'];
    $stmt = $mysqli->prepare('INSERT INTO scores (judge_id, user_id, points) VALUES (?, ?, ?)');
    $stmt->bind_param('iii', $judge_id, $user_id, $points);
    $stmt->execute();
}
header('Location: index.php');
exit;