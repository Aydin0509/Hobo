<?php
$conn = new PDO('mysql:host=localhost;dbname=hobo2022', "root", "root");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="STYLESHEET" href="CSS/Style.css" type="text/css">
    <title>Document</title>
    
</head>
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
    $sql="select LPAD(s.SerieID, 5,'0') SerieID, s.SerieTitel, COUNT(*) AantalS from serie s join seizoen z ON s.SerieID=z.SerieID where actief=1 GROUP BY s.SerieID LIMIT 10;";
    $res = $conn->prepare($sql);
   $res->execute();
   while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
     echo "<div class='blok'>";
 
       echo "<img class='plaatje' src='images/".$row['SerieID'].".jpg'>";
       echo $row['SerieTitel'];
       echo "</div>";
   }
   ?>
    </div>
</section>

<section class="item-kanaal3">
    <h3>Meest geliked</h3>
    <div id="carousel">
      <?php	
    $sql="SELECT SerieID FROM `seizoen`  WHERE Jaar <='2022' ORDER BY `seizoen`.`IMDBRating`  DESC";
    $res = $conn->prepare($sql);
   $res->execute();
   while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
     echo "<div class='blok'>";
 
       echo "<img class='plaatje' src='images/".$row['SerieID'].".jpg'>";
      
       echo "</div>";
   }
   ?>
    </div>
</section>
  

</body>

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