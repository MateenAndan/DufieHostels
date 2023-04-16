<?php
require_once '../model/booking_model.php';

class BookingController {
    private $bookingModel;

    public function __construct() {
        $this->bookingModel = new bookingModel();
    }

    public function getAllBooking() {
        $booking = $this->bookingModel->getAllBooking();
        return $booking;
    }

    public function addBooking($bookingDate, $checkInDate, $checkOutDate, $paymentStatus, $studentId, $roomId) {
        $result = $this->bookingModel->addBooking($bookingDate, $checkInDate, $checkOutDate, $paymentStatus, $studentId, $roomId);
        return $result;
    }

    public function deleteBooking($bookingId) {
        $result = $this->bookingModel->deleteStudent($bookingId);
        return $result;
    }

    public function getBookingById($bookingId) {
        $student = $this->bookingModel->getBookingById($bookingId);
        return $student;
    }
}
