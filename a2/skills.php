<?php require __DIR__ . '/includes/db_connect.inc'; ?>
<?php include __DIR__ . '/includes/header.inc'; ?>
<?php include __DIR__ . '/includes/nav.inc'; ?>

<main>
  <h1>All Skills</h1>

  <form method="get" action="skills.php" style="margin:1rem 0;">
    <input type="text" name="q" placeholder="keyword..." value="<?php echo isset($_GET['q'])?htmlspecialchars($_GET['q']):''; ?>">
    <button type="submit">Search</button>
  </form>

  <?php
  $q = $_GET['q'] ?? '';
  if ($q !== '') {
    $like = '%' . $q . '%';
    $sql = "SELECT skill_id, title, category, rate_per_hr, level, created_at
            FROM skills
            WHERE title LIKE ? OR description LIKE ? OR category LIKE ?
            ORDER BY created_at DESC";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $like, $like, $like);
  } else {
    $sql = "SELECT skill_id, title, category, rate_per_hr, level, created_at
            FROM skills
            ORDER BY created_at DESC";
    $stmt = mysqli_prepare($conn, $sql);
  }
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($res) === 0) {
    echo "<p>No results.</p>";
  } else {
    echo "<table border='1' cellpadding='6' cellspacing='0'>
            <tr>
              <th>Title</th><th>Category</th><th>Level</th><th>Rate/hr</th><th>Created</th>
            </tr>";
    while ($r = mysqli_fetch_assoc($res)) {
      $id   = (int)$r['skill_id'];
      $t    = htmlspecialchars($r['title']);
      $cat  = htmlspecialchars($r['category']);
      $lvl  = htmlspecialchars($r['level']);
      $rate = number_format((float)$r['rate_per_hr'], 2);
      $dt   = htmlspecialchars($r['created_at']);
      echo "<tr>
              <td><a href='details.php?id=$id'>$t</a></td>
              <td>$cat</td>
              <td>$lvl</td>
              <td>\${$rate}</td>
              <td>$dt</td>
            </tr>";
    }
    echo "</table>";
  }
  ?>
</main>

<?php include __DIR__ . '/includes/footer.inc'; ?>
