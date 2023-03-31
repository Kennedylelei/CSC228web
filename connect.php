<?php
//create server and database connection constants
$host = "localhost";
$user = "root";
$pwd = "";
$db = "nairobi-hospital";

$con= new mysqli ($host, $user, $pwd, $db);

//Check server connection
if ($con->connect_error){
	die ("Connection failed:". $con->connect_error);
}else {
	echo "Connected successfully <br />";
}
//receive  values from user form and trim white spaces
    $patient_id = trim($_POST['patient_id']);
    $first_name = trim($_POST['first_name']);
    $middle_name = trim($_POST['middle_name']);
    $surname = trim($_POST['surname']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gender']);
    $county = trim($_POST['county']);

//now insert the received values into database using defined variables
$sqli ="INSERT INTO patient_records(patient_id,first_name,middle_name,surname,dob,gender,county) VALUES ('$patient_id','$first_name','$middle_name','$surname','$dob','$gender','$county')";
if ($con->query($sqli) === TRUE) {
    echo "New patient record created successfully";
} else {
    echo "Error: " . $sqli . "<br>" . $con->error;
}
$con->close(); //close the connection for security reasons
?>