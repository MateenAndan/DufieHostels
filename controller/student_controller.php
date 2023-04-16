
    if($model->createStudent($student_id, $first_name, $last_name, $phone_number, $parent_number, $room_id)){
        header('Location: student_list.php');
    } else {
        echo "Error adding student.";
    }
}