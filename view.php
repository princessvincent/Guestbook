<?php
include_once "connection.php";
include_once "header.php";
?>

<html lang="en">
<head>
    <style>
body{
    text-align: center;
    background-color: lightblue;
}
.ta{
    position: center;
    /* padding: 5px; */
    margin: 15px;
}


    </style>
</head>
<body>
<table border="1" class="ta">
    <thead>
        <tr>
            <th>Fullname</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT  * FROM member";
        $res = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($res)){
$id = $row["id"];
        ?>
        <tr>
<td><?php echo $row["fullname"] ?></td>
<td><?php echo $row["email"] ?></td>
<td><?php echo $row["phone"] ?></td>
<td><a href="edit.php?id=<?php echo $id ?>">Edit</a></td>
<td><a href="delete.php?id=<?php echo $id ?>">Delete</a></td>
        </tr>
        <?php  } ?>
    </tbody>
</table>  
</body>
</html>