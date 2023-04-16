<?php
require_once '../model/payment_model.php';

class PaymentController {
    private $paymentModel;

    public function __construct() {
        $this->paymentModel = new paymentModel();
    }

    public function getAllpayment() {
        $payment = $this->paymentModel->getAllpayment();
        return $payment;
    }

    public function addpayment($paymentDate, $paymentAmount, $paymentType, $bookingId, $studentId) {
        $result = $this->paymentModel->addpayment($paymentDate, $paymentAmount, $paymentType, $bookingId, $studentId);
        return $result;
    }

    public function getpaymentById($paymentId) {
        $payment = $this->paymentModel->getpaymentById($paymentId);
        return $payment;
    }
}
