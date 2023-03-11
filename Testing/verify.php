<?php

if(isset($_GET['vkey'])){
    //process verification
    $vkey = $_GET['vkey'];

    $mysqli = mysqli_connect('localhost', 'root', '', 'test');

    $resultSet = $mysqli->query("SELECT verified,vkey FROM user WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");

    if ($resultSet->num_rows == 1) {
        # code...
        //validate the email
        $update = $mysqli->query("UPDATE user SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");

        if($update){
            echo "your account has been verified. you may now login <a href= 'https://localhost/Testing/login.php' > login </a>";
        }
        else {
            echo $mysqli->error;
        }
    }
    else {
        echo "this account is invalid";
        echo $mysqli->error;
    }

}

else{
    die("Something Went Wrong");
}

?>