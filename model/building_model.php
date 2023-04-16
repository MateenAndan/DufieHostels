<?php
// building_model.php

require_once 'db_config.php';

class BuildingModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllBuildings()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Building");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBuildingById($building_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Building WHERE building_id = :building_id");
        $stmt->bindParam(':building_id', $building_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createBuilding($building_name, $number_of_floors, $number_of_rooms)
    {
        $stmt = $this->pdo->prepare("INSERT INTO Building (building_name, number_of_floors, number_of_rooms) VALUES (:building_name, :number_of_floors, :number_of_rooms)");
        $stmt->bindParam(':building_name', $building_name, PDO::PARAM_STR);
        $stmt->bindParam(':number_of_floors', $number_of_floors, PDO::PARAM_INT);
        $stmt->bindParam(':number_of_rooms', $number_of_rooms, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function updateBuilding($building_id, $building_name, $number_of_floors, $number_of_rooms)
    {
        $stmt = $this->pdo->prepare("UPDATE Building SET building_name = :building_name, number_of_floors = :number_of_floors, number_of_rooms = :number_of_rooms WHERE building_id = :building_id");
        $stmt->bindParam(':building_id', $building_id, PDO::PARAM_INT);
        $stmt->bindParam(':building_name', $building_name, PDO::PARAM_STR);
        $stmt->bindParam(':number_of_floors', $number_of_floors, PDO::PARAM_INT);
        $stmt->bindParam(':number_of_rooms', $number_of_rooms, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteBuilding($building_id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM Building WHERE building_id = :building_id");
        $stmt->bindParam(':building_id', $building_id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
