<?php
require_once './db.php';

class Student
{

    protected $db;

    function __construct()
    {
        $this->db = new DB();
    }

    public function get_students(): array
    {
        $students = array();
        $result = $this->db->submit_query("SELECT * FROM students");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $students[] = $row;
            }
        }
        return $students;
    }

    public function create($student_information)
    {
        $validation = $this->validate_student_info($student_information);
        if ($validation != true)
            return $validation;

        // create the SQL
        $name = $student_information['name'];
        $dob = $student_information['dob'];
        $gender = $student_information['gender'];
        $phone = $student_information['phone'];
        $email = $student_information['email'];
        $sql = "INSERT INTO students (full_name, dob, gender, phone, email) VALUES ('$name','$dob','$gender','$phone','$email')";
        $this->db->submit_query($sql);

        return true;
    }

    protected function validate_student_info($student_information)
    {
        // validate student information
        if (empty($student_information))
            return "Empty Student Information";
        if (!isset($student_information['name']))
            return "Student name is required";
        if (!isset($student_information['gender']))
            return "Student gender is required";
        if ($student_information['gender'] != 'male' && $student_information['gender'] != 'female')
            return "Student gender should be male or female";

        return true;
    }
}
