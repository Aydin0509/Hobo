<?php

  require_once 'partials/header.php';
  require_once 'backend/class/Search.php';
  require_once 'backend/class/Serie.php';

  $serieIns = new Serie();

  ?> 

<style>


.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid green;
  border-right: none;
  padding: 5px;
  height: 20px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: white;
}

.searchTerm:focus{
  color: white;
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid green;
  background: green;
  text-align: center;
  color: white;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

.searchButton i {
  background-color: green;
}

.wrap{
  width: 30%;
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
}


.blok { 
  width: 100%;
  height: 90%;
  margin: 1%;
  float: left;
  color: white;
  font-size: 15pt;
}

.plaatje { 
  width: 150px;
  height: 200px
}	
</style>

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
    <div id="carousel">
      <?php foreach($serieIns->getSeriesByGenre($_GET['genre']) as $serie){ ?>
      <div class='blok'>
        <img class='plaatje' src='images/<?= $serieIns->getSerieImage($serie->SerieID) ?>.jpg' onError="this.onerror=null;this.src='images/noimage.png';"> <br>
        <?= $serie->SerieTitel ?>
      </div>
      <?php } ?>
    </div>
</section>

<?php
}
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


</section>