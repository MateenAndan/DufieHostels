<?php
require_once '../model/maintenance_request_model.php';

class MaintenanceController {
    private $maintenanceModel;

    public function __construct() {
        $this->maintenanceModel = new maintenanceModel();
    }

    public function getAllMaintenance() {
        $maintenance = $this->maintenanceModel->getAllMaintenance();
        return $maintenance;
    }

    public function addMaintenance($requestDate, $requestDescription, $roomId, $maintenaceStatus) {
        $result = $this->maintenanceModel->addMaintenance($requestDate, $requestDescription, $roomId, $maintenaceStatus);
        return $result;
    }

    public function deleteMaintenance($maintenanceId) {
        $result = $this->maintenanceModel->deleteMaintenance($maintenanceId);
        return $result;
    }

    public function getMaintenanceById($maintenanceId) {
        $maintenance = $this->maintenanceModel->getMaintenanceById($maintenanceId);
        return $maintenance;
    }
}
