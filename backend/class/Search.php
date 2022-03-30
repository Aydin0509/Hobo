<?php


require_once 'DbConfig.php';

class Search extends DbConfig{

    public function getGuessedSeries($data){
        $serie = '%' . $data['searchTerm'].'%';
        $sql = "SELECT * FROM serie WHERE SerieTitel LIKE :titel";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':titel', $serie);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


}

?>