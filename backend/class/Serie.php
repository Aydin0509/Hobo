<?php
require_once 'DbConfig.php';
class Serie extends DbConfig{


    public function getSeriesByGenre($genre){
        $sql = "SELECT * FROM serie
        JOIN serie_genre ON
        serie.SerieID = serie_genre.SerieID
        JOIN genre ON
        genre.GenreID = serie_genre.GenreID
        WHERE genre.GenreID = :genre";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':genre', $genre);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getGenres(){
        $sql = "SELECT * FROM genre";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getGenreById($id){
        $sql = "SELECT * FROM genre WHERE GenreID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function getSerieImage($id){

        return substr("0000" . $id , -5);
    }
}


?>