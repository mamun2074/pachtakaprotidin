<?php

class profile
{

    private $userId = '';

    public function showingSingleUser($userId)
    {
        $this->userId = $userId;
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=pachtakaprotidin', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM `users` WHERE `id`=:id";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array(
                ':id' => $this->userId,
            ));
            $singleUserInformation = $stmt->fetch();
            return $singleUserInformation;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function totalDonationSingleUser($userId)
    {
        if (!empty($userId)) {
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=pachtakaprotidin', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = "SELECT SUM(`donation`) FROM `donation_lists` WHERE `user_id`=2";
                $stmt = $pdo->prepare($query);
                $stmt->execute(array(
                    ':id' => $userId,
                ));
                $singleUserInformation = $stmt->fetch();
                return $singleUserInformation;
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }

        }

    }

}