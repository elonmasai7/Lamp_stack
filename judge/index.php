<?php
require_once __DIR__ . '/../includes/db.php';
// Fetch users and judges
$users = $mysqli->query('SELECT * FROM users');\$judges = $mysqli->query('SELECT * FROM judges');
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/lamp-scoring-system/style.css">
    <title>Judge Portal</title>
</head>
<body>
    <h1>Judge Scoring</h1>
    <form action="submit_score.php" method="POST">
        <label>Judge:<br>
            <select name="judge_id" required>
                <option value="">--Select Judge--</option>
                <?php while ($j = $judges->fetch_assoc()): ?>
                <option value="<?= $j['id'] ?>"><?= htmlspecialchars($j['display_name']) ?></option>
                <?php endwhile; ?>
            </select>
        </label><br>

        <label>User:<br>
            <select name="user_id" required>
                <option value="">--Select User--</option>
                <?php while ($u = $users->fetch_assoc()): ?>
                <option value="<?= $u['id'] ?>"><?= htmlspecialchars($u['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </label><br>

        <label>Points (1-100):<br><input type="number" name="points" min="1" max="100" required></label><br>
        <button type="submit">Submit Score</button>
    </form>
</body>
</html>