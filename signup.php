<!DOCTYPE html>
<html>

<head>
    <title>SIGNUP</title>
</head>

<body>
    <?php
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $courses = $_POST["course"];
        $passworda = $_POST["passworda"];
        $passwordb = $_POST["passwordb"];
    
        if($passworda != $passwordb) {
            die("Passwords do not match");
            echo "window.location='signup.html'";   
        }
    
        $conn = new mysqli("localhost","id6688064_root","admin","id6688064_db");
        if($conn->connect_error)
            die("Connection error");
    
        $sql = "SELECT username FROM users";
    
        $result = $conn->query($sql);
    
        if($result->num_rows>0) {
            while($row = $result->fetch_assoc()) {
                if($username==$row["username"]) {
                    die("Username already exists");
                }
            }
        }
    
        $sql2 = "INSERT INTO users (firstname, lastname, username, password, email, courses) VALUES ('$firstname', '$lastname', '$username', '$passworda', '$email', '$courses') ";
    
        if($conn->query($sql2)===TRUE) {
            echo "Record updated successfully";
        }
        else 
            echo "There is an unknown problem"."<br>".$sql2."<br>".$conn->error;
          
    ?>
</body>

</html>
