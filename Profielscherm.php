<?php
  require_once 'partials/header.php';
  require_once 'backend/class/DbConfig.php';
  require_once 'backend/class/Serie.php';
  $serieIns = new Serie();
?>


<div class="dropdown">
  <button class="dropbtn">Genres</button>
  <div class="dropdown-content">
    <?php foreach($serieIns->getGenres() as $genre){ ?>
      <a href="Zoekscherm.php?genre=<?= $genre->GenreID ?>"><?= $genre->GenreNaam ?></a>
    <?php } ?>
  </div>
</div>

<div class="dropdown2">
  <button class="dropbtn2">Weergave</button>
  <div class="dropdown-content2">
  <a href="#">10</a>
  <a href="#">20</a>
  <a href="#">50</a>
  </div>
</div>

<div class="dropdown3">
  <button class="dropbtn3">Privacy</button>
  <div class="dropdown-content3">
  <a href="#">Horror</a>
  <a href="#">Actie</a>
  <a href="#">Scifi</a>
  </div>
</div>