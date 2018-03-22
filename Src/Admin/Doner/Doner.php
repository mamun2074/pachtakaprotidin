<?php

namespace App\Admin\Doner;

/**
 * Created by PhpStorm.
 * User: TRY-BPO
 * Date: 3/20/2018
 * Time: 6:10 PM
 */
class Doner
{
    public function totalDoner(){
        try{
            $pdo=new \PDO('mysql:host=localhost;dbname=pachtakaprotidin','root','');
            $query="SELECT * FROM `users` WHERE `user_status`=1";
            $stmt=$pdo->prepare($query);
            $stmt->execute();
            $values=$stmt->fetchAll();
            return $values;

        }catch (\PDOException $e){
            echo "Error :".$e->getMessage();
        }
    }

    public function totalDonated(){
        try{
            $pdo= new \PDO('mysql:host=localhost;dbname=pachtakaprotidin','root','');
            $query="SELECT SUM(`donation`) FROM `donation_lists` WHERE `status`=1";
            $stmt=$pdo->prepare($query);
            $stmt->execute();
            $donated=$stmt->fetch();
            return $donated;

        }catch (\PDOException $e){
            echo "Error".$e->getMessage();
        }
    }

    public function todaysDonated(){
        $todaysDate="%".date("m/d/Y")."%";
        try{
            $pdo=new \PDO('mysql:host=localhost;dbname=pachtakaprotidin','root','');
            $query="SELECT `donation` FROM `donation_lists` WHERE `donation_date` LIKE :todaysDate AND `status` = 1";
            $stmt=$pdo->prepare($query);
            $stmt->execute(array(
                ':todaysDate'=>$todaysDate,
            ));
            $todaysdonaeted=$stmt->fetchall();
            return $todaysdonaeted;

        }catch (\PDOException $e){
            echo "Error".$e->getMessage();
        }

    }



}