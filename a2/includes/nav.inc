<?php /* includes/nav.inc */ ?>
<nav class="navbar navbar-expand-lg navbar-dark navbar-gradient">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-1" href="index.php">
      <span class="material-symbols-outlined">handshake</span>
      <strong>SkillSwap</strong>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="skills.php">Skills</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="add.php">Add</a></li>
      </ul>

      <form class="d-flex" role="search" action="skills.php" method="get">
        <input class="form-control me-2" type="search" name="q" placeholder="Search skills" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">
          <span class="material-symbols-outlined align-middle" style="font-size:18px">search</span>
        </button>
      </form>
    </div>
  </div>
</nav>
