<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php include __DIR__ . '/includes/header.inc'; ?>
<?php include __DIR__ . '/includes/nav.inc'; ?>

<main class="container py-4">
  <h1 class="h3 mb-3">Add a Skill</h1>

  <form action="process_add.php" method="post" enctype="multipart/form-data" class="row g-3">
    <div class="col-12">
      <label class="form-label">Title* </label>
      <input type="text" name="title" class="form-control" maxlength="150" required>
    </div>

    <div class="col-12">
      <label class="form-label">Description* </label>
      <textarea name="description" rows="5" class="form-control" required></textarea>
    </div>

    <div class="col-md-6">
      <label class="form-label">Category</label>
      <input type="text" name="category" class="form-control" placeholder="e.g., Music / Programming">
    </div>

    <div class="col-md-3">
      <label class="form-label">Rate per hour* ($)</label>
      <input type="number" name="rate_per_hr" class="form-control" step="0.01" min="0" required>
    </div>

    <div class="col-md-3">
      <label class="form-label">Level*</label>
      <select name="level" class="form-select" required>
        <option value="Beginner">Beginner</option>
        <option value="Intermediate" selected>Intermediate</option>
        <option value="Expert">Expert</option>
      </select>
    </div>

    <div class="col-12">
      <label class="form-label">Image (jpg/jpeg/png/gif/webp)</label>
      <input type="file" name="image" id="image" class="form-control" accept="image/*">
      <div class="form-text">可选；仅允许 jpg/jpeg/png/gif/webp；建议 &lt; 5MB。</div>
    </div>

    <div class="col-12">
      <button class="btn btn-primary">Save</button>
    </div>
  </form>
</main>

<?php include __DIR__ . '/includes/footer.inc'; ?>
