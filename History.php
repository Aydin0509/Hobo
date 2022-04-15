<?php

  require_once 'partials/header.php';
  require_once 'backend/class/DbConfig.php';

  $connection = new DbConfig();

  
 

  $sql="SELECT AflTitel, d_start, d_eind, d_eind-d_start AS tijd
  FROM aflevering AS a INNER JOIN stream AS s ON a.AfleveringID = s.AflID
  WHERE KlantID= 10003 ORDER BY s.d_start  ASC";
  ?>

<div style="text-align:center">
  <section class="history">
  <h2>Gegevens</h2>
  <?php
  $res = $connection->connect()->prepare($sql);
  $res->execute();
  while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
  echo $row['AflTitel']. " ";
  echo $row['d_start']. " ";
  echo "kijk tijd =". " ";
  echo $row['tijd']. ' Minutten<br>';
 }
 ?>
</section>
</div>
  
  
 

