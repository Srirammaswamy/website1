<!DOCTYPE html>
<html>

<head>
    <title>COGNITO</title>
</head>

<body>
    <?php
    
        $urm = $_POST["urm"];
        $pwd = $_POST["pwd"];
        $flag = false;
        
        $conn = new mysqli("localhost", "id6688064_root", "admin", "id6688064_db");
        if($conn->connect_error) {
            die("Connection ERROR");
        }
        
        $sql = "SELECT * FROM users";
        
        $result = $conn->query($sql);
        
        while($row = $result->fetch_assoc()) {
            if($urm == $row["username"] || $urm == $row["email"]) {
                if($pwd == $row["password"]) {
                    $flag = true;
                    
                    $username = $row["username"];
                    $firstname = $row["firstname"];
                    $lastname = $row["lastname"];
                    $email = $row["email"];
                    $courses = $row["courses"];
                    
                    echo "LOGIN SUCCESS :)";
                }
            }
        }
        
        if($flag==false)
            die("Username or password incorrect");
        
     
    ?>

</body>
</html>
