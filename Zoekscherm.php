<?php

  require_once 'partials/header.php';
  require_once 'backend/class/Search.php';
  require_once 'backend/class/Serie.php';

  $serieIns = new Serie();

  ?> 



<?php
$search = new Search();

if(isset($_POST['search'])){
  $series = $search->getGuessedSeries($_POST);
} 

?>
<script>
function imgError(image) {
    image.onerror = "";
    image.src = "images/noimage.png";
    return true;
}
</script>
<section>
<div class="wrap">
  <form method="POST"> 
    <div class="search">
      <input type="text" class="searchTerm" name="searchTerm" placeholder="Titels, Series">
      <button type="submit" class="searchButton" name="search">
        <i class="fa fa-search"></i>
        
     </button>
   </div>
  </form>
</div>
<?php
if(isset($_GET['genre'])){
  $genreId = $serieIns->getGenreById($_GET['genre']);
?>
<section class="item-kanaal2">
    <h3>Genre - <?= $genreId->GenreNaam ?></h3>
    <div id="carousel2">
      <?php foreach($serieIns->getSeriesByGenre($_GET['genre']) as $serie){ ?>
      <div class='blok'>
        <img class='plaatje' src='images/<?= $serieIns->getSerieImage($serie->SerieID) ?>.jpg' onError="this.onerror=null;this.src='images/noimage.png';"> <br>
        <?= $serie->SerieTitel ?>
      </div>
      <?php } ?>
    </div>
</section>

<?php } ?>
<div id="carousel2">
  <?php
if(isset($_POST['search'])){
foreach($series as $serie) {
  $plaatje = substr("0000" . $serie->SerieID, -5);
  ?>
  <a href="ALA.php">
  <div class='blok'>

  <img class='plaatje' src='images/<?= $plaatje ?>.jpg' onError="this.onerror=null;this.src='images/noimage.png';"> <br>
  <?php echo $serie->SerieTitel; ?>
  </div>
  </a>
<?php
    }
  }
?>
</div>

</section>