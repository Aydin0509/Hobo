<?php

require_once "DbConfig.php";

class User extends DbConfig{
    public function create($data){

        try{
            if($data['password'] != $data['conf-password']){
                throw new Exception("Wachtwoorden komen niet overeen.");
            }
            $sql = "INSERT INTO klant (email, password, AboID) VALUES (:email, :password, :AboID)";
            $encryptedPassword = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":email", $data['email']);
            $stmt->bindParam(":AboID", $data['option']);
            $stmt->bindParam(":password", $encryptedPassword);
            if(!$stmt->execute()){
                throw new Exception("Account kon niet aangemaakt worden");
            }
            header("Location: aanmelden.php");
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function login($data){
        try {
            $user = $this->getUser($data['email-login']);
            if (!$user) {
                throw new Exception('Gebruiker bestaat niet.');
            }
            if(!password_verify($data['password-login'], $user->password)){
                throw new Exception("wachtwoord is incorrect.");
            }
            session_start();
            $_SESSION['ingelogd'] = true;
            $_SESSION['email'] = $user->Email;
            $_SESSION['id'] = $user->KlantNr;
            $_SESSION['genre'] = $user->Genre;
            header("Location: Profielscherm.php");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getUsers(){
        $sql = "SELECT * FROM klant";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUser($email){
        $sql = "SELECT * FROM klant WHERE Email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

}

























?>