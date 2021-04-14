<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Registration Page</title>
    <link rel="stylesheet" type="text/css" href="css/registration.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">"
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<body>


<div id="introduction">
    <?php

    $username1=$_POST["username"];
    $password1=$_POST["password"];
    $email1=$_POST["email"];






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




    $sql = "SELECT username, email FROM user_details";
    $result = $conn->query($sql);
    $count=0;
    $check=1;
    echo "<br>";

    if ($result->num_rows >= 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $count=$count+1;
            if($email1==$row["email"]) {
                echo "Email Already Registered";

                echo " <br><br><a href='login.html' class='button'>Login</a>";

                $check=0;
                break;

            }
            if($username1==($row["username"])) {
                echo "Please Login with you email , Account already exists";

                echo " <br><br><a href='login.html' class='button'>Login</a>";
                $check=0;
                break;
            }


        }
        if ($check==1){

            $sql = "INSERT INTO user_details (user_id, username, email, password) VALUES ('$count','$username1','$email1','$password1')";

            if ($conn->query($sql) === TRUE) {
                echo "Successfully Registered";
                echo "<br><br><a href='login.html' class='button'>Login</a>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }

    } else {
        echo "0 results";
    }
    $conn->close();


    ?></div>

<footer class="page-footer font-small blue fixed-bottom bg-primary">
    <div class="footer-copyright text-center py-3">© 2020 V-loop Video App. All Rights Reserved.
    </div>
</footer>
</body>
</html>