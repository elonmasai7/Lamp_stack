<?php
require_once __DIR__ . '/../includes/db.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $mysqli->real_escape_string($_POST['username']);
    $display_name = $mysqli->real_escape_string($_POST['display_name']);
    $sql = "INSERT INTO judges (username, display_name) VALUES ('$username', '$display_name')";
    if ($mysqli->query($sql)) {
        $message = 'Judge added successfully.';
    } else {
        $message = 'Error: ' . $mysqli->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/lamp-scoring-system/style.css">
    <title>Admin Panel - Judges</title>
</head>
<body>
    <h1>Admin: Add Judge</h1>
    <?php if ($message) echo "<p>$message</p>"; ?>
    <form method="POST">
        <label>Username:<br><input name="username" required></label><br>
        <label>Display Name:<br><input name="display_name" required></label><br>
        <button type="submit">Add Judge</button>
    </form>

    <h2>Current Judges</h2>
    <ul>
        <?php
        $res = $mysqli->query('SELECT * FROM judges');
        while ($row = $res->fetch_assoc()) {
            echo '<li>' . htmlspecialchars($row['display_name']) . ' (' . htmlspecialchars($row['username']) . ')</li>';
        }
        ?>
    </ul>
</body>
</html>