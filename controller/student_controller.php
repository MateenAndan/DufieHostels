<?php
require_once '../model/student_model.php';

class StudentController {
    private $studentModel;

    public function __construct() {
        $this->studentModel = new StudentModel();
    }

    public function getAllStudents() {
        $students = $this->studentModel->getAllStudents();
        return $students;
    }

    public function addStudent($firstName, $lastName, $phoneNumber, $parentNumber) {
        $result = $this->studentModel->addStudent($firstName, $lastName, $phoneNumber, $parentNumber);
        return $result;
    }

    public function updateStudent($studentId, $firstName, $lastName, $phoneNumber, $parentNumber) {
        $result = $this->studentModel->updateStudent($studentId, $firstName, $lastName, $phoneNumber, $parentNumber);
        return $result;
    }

    public function deleteStudent($studentId) {
        $result = $this->studentModel->deleteStudent($studentId);
        return $result;
    }

    public function getStudentById($studentId) {
        $student = $this->studentModel->getStudentById($studentId);
        return $student;
    }
}
