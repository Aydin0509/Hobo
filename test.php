<html>
<head>
<title>Series HOBO</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	.blok { width: 20%; height: 30%; background-color: black;
	        margin: 1%; float: left; color: yellow; font-size: 15pt;}
	.plaatje { width: 100%; height:100%; }	
	body { background-color: green; }
	</style>
</head>
<body>
	<?php	
   	$conn = new PDO('mysql:host=localhost;dbname=hobo2022', "root", "root");
 	$sql="select LPAD(s.SerieID, 5,'0') SerieID, s.SerieTitel, COUNT(*) AantalS from serie s join seizoen z ON s.SerieID=z.SerieID where actief=1 GROUP BY s.SerieID ;";
 	$res = $conn->prepare($sql);
	$res->execute();
	while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
		echo "<div class='blok'>";

	    echo "<img class='plaatje' src='images/".$row['SerieID'].".jpg'>";
		echo $row['SerieTitel']."<p><small>".$row['AantalS']." seizoenen</small>";
	    echo "</div>";
	}
	?>

	</body>
</html>
