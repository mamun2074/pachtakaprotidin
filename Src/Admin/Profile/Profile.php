<?php

namespace App\Admin\Profile;

class profile
{

    private $userId = '';

    public function showingSingleUser($userId)
    {
        $this->userId = $userId;
        try {
            $pdo = new \PDO('mysql:host=localhost;dbname=pachtakaprotidin', 'root', '');

            $query = "SELECT * FROM `users` WHERE `id`=:id";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array(
                ':id' => $this->userId,
            ));
            $singleUserInformation = $stmt->fetch();
            return $singleUserInformation;
        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function totalDonationSingleUser($userId)
    {
        if (!empty($userId)) {
            try {
                $pdo = new \PDO('mysql:host=localhost;dbname=pachtakaprotidin', 'root', '');

                $query = "SELECT  SUM(`donation`) FROM `donation_lists` WHERE (`user_id`=:id and `status` !=0)";
                $stmt = $pdo->prepare($query);
                $stmt->execute(array(
                    ':id' => $userId,
                ));
                $singleUserInformation = $stmt->fetch();
                return $singleUserInformation;
            } catch (\PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }

        }

    }

    public function singleUserDonation($userId, $donation, $donation_date)
    {

        try {
            $pdo = new \PDO('mysql:host=localhost;dbname=pachtakaprotidin', 'root', '');
            $query = "INSERT INTO `donation_lists`(`user_id`, `donation` , `donation_date`) VALUES (:userId,:donation, :doantionDate)";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array(
                ':userId' => $userId,
                ':donation' => $donation,
                ':doantionDate' => $donation_date,
            ));
            $check = $stmt->rowCount();
            return $check;

        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }

    public function searchDonationDate($userId, $donateDate)
    {

        try {
            $pdo = new \PDO('mysql:host=localhost;dbname=pachtakaprotidin', 'root', '');
            $query = "SELECT `donation_date` FROM `donation_lists` where `donation_date`  LIKE :donationDate and `user_id`=:id";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array(
                ':donationDate' => "%" . $donateDate . "%",
                ':id' => $userId,
            ));
            return $stmt->fetch();

        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }

    public function unApproveDoantion()
    {

        try {
            $pdo = new \PDO('mysql:host=localhost;dbname=pachtakaprotidin', 'root', '');
            $query = "SELECT  users.id ,users.userName , donation_lists.donation , donation_lists.donation_date ,donation_lists.create_at
FROM users
INNER JOIN donation_lists
ON donation_lists.status =0 and users.id=donation_lists.user_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array());
            return $stmt->fetchall();

        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }

    }


    public function changeDonationStatus($unapproveInformation)
    {

        try {
            $pdo = new \PDO('mysql:host=localhost;dbname=pachtakaprotidin', 'root', '');
            $query = "UPDATE `donation_lists` SET `status` = '1' WHERE `user_id`=:donationId and `donation_date`=:doantionDate";
            $stmt=$pdo->prepare($query);
            $result=$stmt->execute(array(
                ':donationId'   =>$unapproveInformation['donationId'],
                ':doantionDate' =>$unapproveInformation['doantionDate'],
            ));

            return $result;

        } catch (\PDOException $e) {
            echo "Errow :" . $e->getMessage();
        }

    }


}