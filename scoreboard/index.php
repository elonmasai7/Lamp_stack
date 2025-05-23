<?php
require_once __DIR__ . '/../includes/db.php';
$sql = "SELECT u.name, COALESCE(SUM(s.points),0) AS total
        FROM users u
        LEFT JOIN scores s ON u.id = s.user_id
        GROUP BY u.id
        ORDER BY total DESC";
$res = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="10">
    <link rel="stylesheet" href="/lamp-scoring-system/style.css">
    <title>Public Scoreboard</title>
</head>
<body>
    <h1>Scoreboard</h1>
    <table>
        <tr><th>User</th><th>Total Points</th></tr>
        <?php while ($row = $res->fetch_assoc()): ?>
        <tr class="<?= $row['total'] > 0 ? 'highlight' : '' ?>">
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['total'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <p>Auto-refreshes every 10s.</p>
</body>
</html>