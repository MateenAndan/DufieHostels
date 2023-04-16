<?php

require_once '../model/student_model.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $model = new StudentModel($pdo);

    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $parent_number = $_POST['parent_number'];
    $room_id = $_POST['room_id'];

    if($model->createStudent($student_id, $first_name, $last_name, $phone_number, $parent_number, $room_id)){
        header('Location: student_list.php');
    } else {
        echo "Error adding student.";
    }
}