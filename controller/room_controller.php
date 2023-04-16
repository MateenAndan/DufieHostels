<?php
require_once '../model/room_model.php';

class RoomController {
    private $roomModel;

    public function __construct() {
        $this->roomModel = new roomModel();
    }

    public function getAllroom() {
        $room = $this->roomModel->getAllroom();
        return $room;
    }

    public function addRoom($roomNumber, $roomType, $numberOfBeds, $price, $availabilityStatus, $buildingId, $studentId) {
        $result = $this->roomModel->addRoom($roomNumber, $roomType, $numberOfBeds, $price, $availabilityStatus, $buildingId, $studentId);
        return $result;
    }

   
    public function getroomById($roomId) {
        $room = $this->roomModel->getroomById($roomId);
        return $room;
    }
}
