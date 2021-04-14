<?php

session_start();
$email=$_POST["email"];
$pwd=$_POST["pwd"];


$_SESSION["i"]="HTML";

$servername = "localhost";
$uname = "root";
$password = "";
$dbname="videoapp";

// Create connection
$conn = new mysqli($servername, $uname, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$sql = "SELECT * FROM user_details where email='$email'";
$result = $conn->query($sql);
$count=0;
$check=1;
echo "<br>";

if ($result->num_rows  ==1 ) {

    echo "entered here";
    $row = $result->fetch_assoc();

    $_SESSION["email"]=$row['email'];
    if ($row["password"]==$pwd){
        echo "entered here 1";
        echo ("<script LANGUAGE='JavaScript'>
          window.alert('Logged In successfully');
          window.location.href='index.html';
       </script>");
    }
    else{
        echo ("<script LANGUAGE='JavaScript'>
          window.alert('Incorrect UserName Or Password Please Try Again');
          window.location.href='login.html';
       </script>");
    }

} else {
    echo ("<script LANGUAGE='JavaScript'>
          window.alert('Incorrect UserName Or Password Please Try Again');
          window.location.href='login.html';
       </script>");
}
$conn->close();
?>