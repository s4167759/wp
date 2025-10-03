<?php require __DIR__ . '/includes/db_connect.inc'; ?>
<?php include __DIR__ . '/includes/header.inc'; ?>
<?php include __DIR__ . '/includes/nav.inc'; ?>

<main>
<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) { echo "<p>Invalid id.</p>"; include __DIR__ . '/includes/footer.inc'; exit; }

$sql = "SELECT skill_id, title, description, category, image_path, rate_per_hr, level, created_at
        FROM skills WHERE skill_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
if (!$row = mysqli_fetch_assoc($res)) {
  echo "<p>Not found.</p>";
} else {
  $t   = htmlspecialchars($row['title']);
  $d   = nl2br(htmlspecialchars($row['description']));
  $cat = htmlspecialchars($row['category']);
  $img = htmlspecialchars($row['image_path'] ?? '');
  $lvl = htmlspecialchars($row['level']);
  $rate= number_format((float)$row['rate_per_hr'], 2);
  $dt  = htmlspecialchars($row['created_at']);

  echo "<h1>$t</h1>";
  if ($img) {
    echo "<p><img src='". $img ."' alt='". $t ."' style='max-width:360px;height:auto;border:1px solid #ccc'></p>";
  }
  echo "<p><strong>Category:</strong> $cat</p>";
  echo "<p><strong>Level:</strong> $lvl</p>";
  echo "<p><strong>Rate:</strong> \${$rate}/hr</p>";
  echo "<p><strong>Created:</strong> $dt</p>";
  echo "<h3>Description</h3><p>$d</p>";
}
?>
  <p><a href="skills.php">← Back to list</a></p>
</main>

<?php include __DIR__ . '/includes/footer.inc'; ?>
