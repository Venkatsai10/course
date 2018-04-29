<?php
 $servername = "localhost";
 $username = "venkat";
 $password = "root";
 $dbname = "course";
 
 $conn= new mysqli($servername, $username, $password, $dbname);
 if($conn->connect_error)  {
     die("connection failed : " .$conn->connect_error);
 }
 //echo json_decode($_POST);
//exit();
 $courseId = $_POST['courseid'];
 $courseType = $_POST['coursetype'];
 $courseName = $_POST['coursename'];
 $sql = "INSERT INTO courses(course_id,course_name,course_type) VALUES ('{$courseId}','{$courseName}','{$courseType}')
  ON DUPLICATE KEY UPDATE course_name = '{$courseName}',course_type='{$courseType}'";
 if ($conn->query($sql) === TRUE) {
    echo true;
} else {
    echo false;
}
?>