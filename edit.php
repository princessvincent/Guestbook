<?php
session_start();

include_once "connection.php";
include_once "header.php";
//this will execute if id is exist in the URL BOX
if(isset($_GET['id'])){
    //this will get the id from the URL BOX and store it in a variable $id
    $id = $_GET["id"];
    //this will store the value of $id inside session
    $_SESSION["id"] = $id;

//this will execute if the id has been store inside session
}elseif(isset($_SESSION["id"])){
    //get/retrieve id from session 
    $id = $_SESSION["id"];
}

//updating the record
if(isset($_POST["update"])){
    $ID =  $_POST["id"];
    $full = $_POST["fullname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
 
    $update = "UPDATE member SET fullname = '$full', email = '$email', phone = '$phone' WHERE id = '$ID'";
    $rest = mysqli_query($conn,$update);
    if($rest){
        echo "Guest Information Updated!";
        // header("location:view.php");
    }else{
       echo " Unable to Update Guest Information";
    }
    
 }

 $sql = "SELECT * FROM member WHERE id = $id";
    
 $res = $conn->query($sql);
 //print_r(mysqli_error($conn));
 if($res->num_rows !=1){
     die("id is not available!");
 }
 $data = $res->fetch_assoc();

?>

<html lang="en">

<head>
   <style>
body{
    color: white;
    text-align: center;
}
.cen{
    background-color: lightblue;
    width: 1500px;
    height: 200px;
}
.up{
    color: white;
    background-color: red;
}

   </style>
</head>

<body>
    <div class="cen">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id']?>"><br><br>
            <input type="text" name="fullname" value="<?php echo $data['fullname']?>" required><br><br>
            <input type="number" name="phone" value="<?php echo $data['phone']?>"required><br><br>
            <input type="email" name="email" value="<?php echo $data['email'] ?>"required><br><br>
            <button type="submit" name="update" class="up">Update</button>
        </form>
    </div>
</body>

</html>