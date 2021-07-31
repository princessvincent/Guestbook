<?php
include_once "connection.php";
include_once "header.php";
if(isset($_POST["sub"])){
    if(isset($_POST["fullname"]) && isset($_POST["email"]) && isset($_POST["phone"])){

        $full = $_POST["fullname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
    

if(filter_var("$email, FILTER_VALIDATE_EMAIL")){
    $email_error = "Invalid email";
}
if(filter_var("$phone,FILTER_VALIDATE_INT")){
        $num_error = "Phone number should be intergers only";
}
$sql  = "SELECT * FROM member WHERE email = '$email'";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res) == 1){
    echo "sorry..... Email address already exist!";
}else{
    $sql1 = "INSERT INTO member (fullname,email,phone) VALUES ('$full','$email','$phone')";

    $rest = mysqli_query($conn,$sql1);

    $_SESSION["logged"] = mysqli_fetch_assoc($rest);

    if($rest){
        echo "Guest created successfully!";
    }else{
        echo "Unable to create a Guest!";
    }
}

    }
}
?>

<html lang="en">
<head>
    
    <title>Document</title>
    <style>
body{
    text-align: center;
    background-color:wheat;
    background-position: center;
    background-size: 500px;

}.form{
    color: whitesmoke;
    background-color: brown;
    width: 800px;
    height: 200px;
    padding: 20px;
    text-align: center;
}


    </style>

</head>
<body>
  <div class="form">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
Fullname: <input type="text" name="fullname" placeholder="Fullname" required><br><br>
Email: <input type="email" name="email" placeholder="Email" required><br><br>
Phone: <input type="number" name="phone" placeholder="Phone" required><br><br>
<!-- Password: <input type="password" name="password" placeholder="Password" required><br><br> -->
<button type="submit" name="sub">Submit</button>
      </form>
  </div>  
</body>
</html>