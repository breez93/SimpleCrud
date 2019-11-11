<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clevertechie";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST["create"])){
    $login=$_POST["email"];
    $location=$_POST["location"];
    $_SESSION["registo"]=1;
    $_SESSION["user"]=1;
    $sql = "INSERT INTO user(nome, location)
    VALUES ('$login','$location')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

if(isset($_GET["delete"])){

    $id=$_GET["delete"];
    $delete="DELETE * from user where iduser='$id'";
    $resultdelete=mysqli_query($delete,$con);
    
}
if(isset($_GET["edit"])){


    $id=$_GET["edit"];
    $editar="SELECT * FROM user WHERE iduser='$id'";
    $row=mysqli_fetch_assoc($resultedit);
    $nome=$row['nome'];
    $location=$row["location"];
    

    }
}

?>