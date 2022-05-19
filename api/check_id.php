<?php

include('../common.php');

$email = $_GET['email'];

// echo $email;
// echo "<br>";

$sql = "select email from member
        where email ='$email'";

$result = $conn -> query($sql);

$data = mysqli_fetch_assoc($result);

if($data) {
        // 중복
        echo json_encode(array('result' => 'yes'));
} else {
        // 중복이 아님
        echo json_encode(array('result' => 'no'));
}

// print_r($data); //배열
// echo json_encode($data); //key:value 타입

?>