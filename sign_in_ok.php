<?php

include('common.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select no, email, password from member
        where email = '$email'";
// 사용자가 입력한 이메일에 해당하는 query 실행

$result = $conn -> query($sql);

$db_pw = mysqli_fetch_assoc($result);

print_r($db_pw);


if($db_pw) {

    if($password == $db_pw['password']) {
        $_SESSION['no'] = $db_pw['no'];
        $_SESSION['email'] = $db_pw['email'];
        // query에 대한 return 값이 있다면 session에 값을 저장한다.
        echo "
        <script>
            location.href = 'index.php'
        </script>
        ";
    } else {
        // echo $db_pw['password'];
        echo "
        <script>
            alert('비밀번호가 틀립니다.')
            history.back();
        </script>
        ";
    }
      
} else {
    echo "
    <script>
        history.back()
    </script>
    ";
}


?>