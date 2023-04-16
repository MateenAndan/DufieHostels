<?php
require_once '../model/building_model.php';

class BuildingController {
    private $buildingModel;

    public function __construct() {
        $this->buildingModel = new buildingModel();
    }

    public function getAllbuilding() {
        $building = $this->buildingModel->getAllbuilding();
        return $building;
    }

    public function addBuilding($buildingName, $numberOfFloors, $numberOfRooms) {
        $result = $this->buildingModel->addBuilding($buildingName, $numberOfFloors, $numberOfRooms);
        return $result;
    }

    public function deleteBuilding($buildingId) {
        $result = $this->buildingModel->deleteBuilding($buildingId);
        return $result;
    }

    public function getbuildingById($buildingId) {
        $building = $this->buildingModel->getbuildingById($buildingId);
        return $building;
    }
}
