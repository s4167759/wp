<?php
require __DIR__ . '/includes/db_connect.inc';

function fail($msg, $code = 400) {
  http_response_code($code);
  echo "<div style='max-width:720px;margin:2rem auto;font-family:system-ui'>
          <h3>Submit failed</h3><p>$msg</p>
          <p><a href='add.php'>← Back to form</a></p>
        </div>";
  exit;
}

$title = trim($_POST['title'] ?? '');
$desc  = trim($_POST['description'] ?? '');
$cat   = trim($_POST['category'] ?? '');
$rate  = $_POST['rate_per_hr'] ?? '';
$level = $_POST['level'] ?? '';

if ($title === '' || $desc === '' || $rate === '' || $level === '') {
  fail('Missing required fields.');
}

if (!is_numeric($rate) || (float)$rate < 0) {
  fail('Invalid rate.');
}
$rate = (float)$rate;

$allowedLevels = ['Beginner','Intermediate','Expert'];
if (!in_array($level, $allowedLevels, true)) {
  fail('Invalid level value.');
}

$imageRelPath = null;
if (!empty($_FILES['image']['name'])) {
  if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    fail('Image upload error code: ' . $_FILES['image']['error']);
  }

  $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
  $allowedExt = ['jpg','jpeg','png','gif','webp'];
  if (!in_array($ext, $allowedExt, true)) {
    fail('Invalid image type. Allowed: jpg, jpeg, png, gif, webp');
  }

  if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
    fail('Image is too large. Max 5MB.');
  }

  $uniq = date('Ymd_His') . '_' . bin2hex(random_bytes(4));
  $newName = $uniq . '.' . $ext;

  $destDirAbs = __DIR__ . '/assets/images/skills';
  if (!is_dir($destDirAbs)) {
    mkdir($destDirAbs, 0777, true);
  }

  $destAbs = $destDirAbs . '/' . $newName;
  if (!move_uploaded_file($_FILES['image']['tmp_name'], $destAbs)) {
    fail('Failed to move uploaded file.');
  }

  $imageRelPath = 'assets/images/skills/' . $newName;
}

$sql = "INSERT INTO skills (title, description, category, image_path, rate_per_hr, level)
        VALUES (?,?,?,?,?,?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'ssssds', $title, $desc, $cat, $imageRelPath, $rate, $level);
mysqli_stmt_execute($stmt);

$newId = mysqli_insert_id($conn);

header('Location: details.php?id=' . $newId);
exit;
