<?php

namespace Models;


class User extends Model {

    //retourne les infos de lutilisateur choisis
    public function findAllInfoUser($email): array{

        //select les infos de lutilisateur choisis
        $query = $this->pdo->prepare("SELECT * FROM `users` WHERE `email` = '$email'");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        $user=$query->fetchall();

        return $user;
    }

    public function findAllUser(): array{

        //select les infos de lutilisateur choisis
        $query = $this->pdo->prepare("SELECT * FROM `users`");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        $user=$query->fetchall();

        return $user;
    }

    
    //retourne les infos de lutilisateur choisis avec id
    public function findInfoUser($id):array{
        $requette = $this->pdo->prepare("SELECT * FROM `users` WHERE `id`= '$id'");
        $requette->setFetchMode(\PDO::FETCH_ASSOC);
        $requette->execute();
        $recuper=$requette->fetchall();
        return $recuper;
    
    }

    // update le login de l'utilisateur
    public function updateLogin($newlog,$id){
        $update = $this->pdo->prepare("UPDATE `utilisateurs` SET `login`= '$newlog' WHERE `id` = '$id'");
        $result = $update->execute();
        return $result;
    }

    // update le password de l'utilisateur
    public function updatePassword($newpassWrd,$id):void{
        $update = $this->pdo->prepare("UPDATE `utilisateurs` SET `password`= '$newpassWrd' WHERE `id` = '$id'");
        $update->execute();
    }

    // insert le user dans la bdd
    public function insertUser($firstname,$lastname,$email,$password,$NumberPhone,$adress,$date,$role = NULL):void{
    $data = [
        'firstname' =>$firstname,
        'lastname' =>$lastname,
        'emaile' =>$email,
        'NumberPhone' =>$NumberPhone,
        'password' =>$password,
        'address' =>$adress,
        'date' =>$date,
        'role' =>$role,
    ];
        $query = "INSERT INTO `users`(`email`, `firstname`, `lastname`, `password`, `address`, `number`, `date`, `role`) VALUES (:emaile, :firstname, :lastname, :password, :address, :NumberPhone, :date ,:role)";
        $password = $this->pdo->prepare($query);
        $password->execute($data);

        session_start();
        $_SESSION['flash']['sucess'] = "Your account has been create, you can now log in. ";
    }

    public function deleteUsers($id){
        $query = $this->pdo->prepare("DELETE FROM `users` WHERE id = $id");
        $query->execute();
    }

    public function UpdateAll($email,$firstname,$lastname,$password,$address,$NumberPhone,$role,$id){
        $update = $this->pdo->prepare("UPDATE `users` SET `email`= '$email', `firstname`= '$firstname', `lastname`= '$lastname', `password`= '$password' , `address`= '$address', `number`= '$NumberPhone',`role`='$role' WHERE `id` = '$id'");
        $update->execute();
    }

    public function UpdateProfil($email,$firstname,$lastname,$password,$address,$NumberPhone,$id){
        $update = $this->pdo->prepare("UPDATE `users` SET `email`= '$email', `firstname`= '$firstname', `lastname`= '$lastname', `password`= '$password' , `address`= '$address', `number`= '$NumberPhone'WHERE `id` = '$id'");
        $update->execute();
    }
}

?>