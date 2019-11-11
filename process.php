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


    $_SESSION["message"]="Created successfully";
    $_SESSION["msg_type"]="sucess";
    $sql = "INSERT INTO user(nome, location)
    VALUES ('$login','$location')";



if (mysqli_query($conn, $sql)) {
    header("location:index.php");
    echo"<a href=index.php class=button value=Home>Home</a><br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
if(isset($_GET["delete"])){

    $id=$_GET["delete"];
    $delete="DELETE from user where iduser='$id' ";
    $resultdelete=mysqli_query($conn,$delete);   
    $_SESSION["message"]="Data has been deleted";
    $_SESSION["msg_type"]="danger";
    header("location:index.php");
}
if(isset($_GET["edit"])){
    $id=$_GET["edits"];
    $editar= "SELECT FROM user WHERE iduser='$id'";
    $resultedit=mysqli_query($conn,$editar);
}


?>