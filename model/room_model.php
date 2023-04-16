<?php
// room_model.php

require_once 'db_config.php';

class RoomModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllRooms()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Room");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoomById($room_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Room WHERE room_id = :room_id");
        $stmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createRoom($room_number, $room_type, $number_of_beds, $price, $availability_status, $building_id)
    {
        $stmt = $this->pdo->prepare("INSERT INTO Room (room_number, room_type, number_of_beds, price, availability_status, building_id) VALUES (:room_number, :room_type, :number_of_beds, :price, :availability_status, :building_id)");
        $stmt->bindParam(':room_number', $room_number, PDO::PARAM_INT);
        $stmt->bindParam(':room_type', $room_type, PDO::PARAM_STR);
        $stmt->bindParam(':number_of_beds', $number_of_beds, PDO::PARAM_INT);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':availability_status', $availability_status, PDO::PARAM_STR);
        $stmt->bindParam(':building_id', $building_id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function updateRoom($room_id, $room_number, $room_type, $number_of_beds, $price, $availability_status, $building_id)
    {
        $stmt = $this->pdo->prepare("UPDATE Room SET room_number = :room_number, room_type = :room_type, number_of_beds = :number_of_beds, price = :price, availability_status = :availability_status, building_id = :building_id WHERE room_id = :room_id");
        $stmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);
        $stmt->bindParam(':room_number', $room_number, PDO::PARAM_INT);
        $stmt->bindParam(':room_type', $room_type, PDO::PARAM_STR);
        $stmt->bindParam(':number_of_beds', $number_of_beds, PDO::PARAM_INT);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':availability_status', $availability_status, PDO::PARAM_STR);
        $stmt->bindParam(':building_id', $building_id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteRoom($room_id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM Room WHERE room_id = :room_id");
        $stmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}