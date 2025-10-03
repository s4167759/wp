<?php require __DIR__ . '/includes/db_connect.inc'; ?>
<?php include __DIR__ . '/includes/header.inc'; ?>
<?php include __DIR__ . '/includes/nav.inc'; ?>

<main>
  <h1>Gallery</h1>
  <div style="display:flex;flex-wrap:wrap;gap:12px;">
  <?php
  $sql = "SELECT skill_id, title, image_path FROM skills ORDER BY created_at DESC";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($res) === 0) {
    echo "<p>No images yet.</p>";
  } else {
    while ($r = mysqli_fetch_assoc($res)) {
      $id  = (int)$r['skill_id'];
      $t   = htmlspecialchars($r['title']);
      $img = htmlspecialchars($r['image_path'] ?? '');
      if (!$img) continue;
      echo "<a href='details.php?id=$id' title='$t'>
              <img src='$img' alt='$t' style='width:180px;height:180px;object-fit:cover;border:1px solid #ddd'>
            </a>";
    }
  }
  ?>
  </div>
</main>

<?php include __DIR__ . '/includes/footer.inc'; ?>
