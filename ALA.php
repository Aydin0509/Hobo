<?php

  require_once 'partials/header.php';
  require_once 'backend/class/DbConfig.php';

  $connection = new DbConfig();

?>
<body>
 <!-- Slideshow container -->
 <div class="slideshow-container">

    <h3>Nieuwste releases</h3>
    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
      <img src="images/Transformer.png" style="width:50%;">
    </div>

    <div class="mySlides fade">
      <img src="images/The liberator.png" style="width:50%">
    </div>

    <div class="mySlides fade">
      <img src="images/The Haunting.png" style="width:50%">
    </div>
    <div class="mySlides fade">
      <img src="images/The queen.png" style="width:50%">
    </div>

    
    
  
  
  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
    
  </div>
  
</div>
<section class="item-kanaal2">
    <h3>Trending</h3>
    <div id="carousel">
      <?php	
    $sql="select LPAD(s.SerieID, 5,'0') SerieID, s.SerieTitel, COUNT(*) AantalS from serie s join seizoen z ON s.SerieID=z.SerieID where actief=1 GROUP BY s.SerieID LIMIT 20;";
    $res = $connection->connect()->prepare($sql);
   $res->execute();
   while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
    $plaatje = substr("0000" . $row['SerieID'] , -5);
    ?>
    <a href="ALA.php">
    <div class='blok'>
  
    <img class='plaatje' src='images/<?= $plaatje ?>.jpg' onError="this.onerror=null;this.src='images/noimage.png';"> <br>
    <?php echo $row['SerieTitel'] ?>
    </div>
    </a>
  <?php
  }
  ?>
    </div>
</section>

<section class="item-kanaal2">
    <h3>Meest geliked</h3>
    <div id="carousel">
      <?php	
    $sql="SELECT SerieID FROM `seizoen`  WHERE Jaar <='2022' ORDER BY `seizoen`.`IMDBRating` LIMIT 20; DESC";
    $res = $connection->connect()->prepare($sql);
   $res->execute();
   while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
   $plaatje = substr("0000" . $row['SerieID'] , -5);
    ?>
    <a href="ALA.php">
    <div class='blok'>
  
    <img class='plaatje' src='images/<?= $plaatje ?>.jpg' onError="this.onerror=null;this.src='images/noimage.png';"> <br>
    
    </div>
    </a>
  <?php
  }
  
  ?>
    </div>
</section>
  

</body>

<footer>
  <br><br>
</footer>

<script>
var slideIndex = 0;
showSlides();



function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 5000); // Change image every 5 seconds
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}
</script>
</html>

