<?php 
include "dbh.php";
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://taniarascia.github.io/primitive/css/main.css" />
    <title></title>
</head>

<body>
    <div class="container">
        <h2>Basic Crud</h2>
    </div>
    <?php
$select="SELECT * from user";
$result = mysqli_query($con,$select)
?>
    <div class="container">
        <table class="table">
            <td>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location </th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>
              <td>".$row["nome"]."</td>"."
              <td>".$row["location"]."</td>";?>
            <td>
                <a href="index.php?edit=<?php echo $row["iduser"];?>" name="edit" class="button">Edit</a>
                <a href="process.php?delete=<?php echo $row["iduser"];?>" name="delete" class="button">Delete</a>
            </td>
            <?php
 }
}
?>
        </table>
    </div>
    <form action="process.php" method="POST">
        <div class="container">
            <label for="name"> Login : </label>
            <input type="text" name="email" placeholder="insert login email" id="email" required>
            <label for="password">Location :</label>
            <input type="password" name="location" required placeholder="insert your location">
            <input type="submit" class="button" name="create" value="Create">
        </div>
    </form>
</body>

</html>