<?php require __DIR__ . '/includes/db_connect.inc'; ?>
<?php include __DIR__ . '/includes/header.inc'; ?>
<?php include __DIR__ . '/includes/nav.inc'; ?>

<main class="container py-4">

  <div id="homeCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/images/banner1.jpg" class="d-block w-100" alt="Banner 1">
      </div>
      <div class="carousel-item">
        <img src="assets/images/banner2.jpg" class="d-block w-100" alt="Banner 2">
      </div>
      <div class="carousel-item">
        <img src="assets/images/banner3.jpg" class="d-block w-100" alt="Banner 3">
      </div>
      <div class="carousel-item">
        <img src="assets/images/banner4.jpg" class="d-block w-100" alt="Banner 4">
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <h2 class="h4">Latest Skills</h2>
  <?php
  $sql = "SELECT skill_id, title, image_path, rate_per_hr, level, created_at
          FROM skills ORDER BY created_at DESC LIMIT 4";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($res) === 0) {
    echo "<p>No skills yet.</p>";
  } else {
    echo "<ul class='list-unstyled'>";
    while ($r = mysqli_fetch_assoc($res)) {
      $id   = (int)$r['skill_id'];
      $t    = htmlspecialchars($r['title']);
      $lvl  = htmlspecialchars($r['level']);
      $rate = number_format((float)$r['rate_per_hr'], 2);
      echo "<li class='mb-2'><a href='details.php?id=$id'>$t</a> — $lvl — \${$rate}/hr</li>";
    }
    echo "</ul>";
  }
  ?>
</main>

<?php include __DIR__ . '/includes/footer.inc'; ?>
