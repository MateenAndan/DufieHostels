<?php
// student_model.php

require_once 'db_config.php';

class StudentModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllStudents()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Student");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStudentById($student_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Student WHERE student_id = :student_id");
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createStudent($first_name, $last_name, $phone_number, $parent_number, $room_id)
    {
        $stmt = $this->pdo->prepare("INSERT INTO Student (first_name, last_name, phone_number, parent_number, room_id) VALUES (:first_name, :last_name, :phone_number, :parent_number, :room_id)");
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
        $stmt->bindParam(':parent_number', $parent_number, PDO::PARAM_STR);
        $stmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function updateStudent($student_id, $first_name, $last_name, $phone_number, $parent_number, $room_id)
    {
        $stmt = $this->pdo->prepare("UPDATE Student SET first_name = :first_name, last_name = :last_name, phone_number = :phone_number, parent_number = :parent_number, room_id = :room_id WHERE student_id = :student_id");
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
        $stmt->bindParam(':parent_number', $parent_number, PDO::PARAM_STR);
        $stmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteStudent($student_id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM Student WHERE student_id = :student_id");
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
