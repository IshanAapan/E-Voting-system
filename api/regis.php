<?php
include("connect.php");

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$state=$_POST['slct1'];
$city=$_POST['slct2'];
$address=$_POST['address'];
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];
$role=$_POST['role'];

if($password==$cpassword){
    move_uploaded_file($tmp_name,"../uploads/$image");
    $insert=mysqli_query($connect,"INSERT INTO user(fname,lname,mobile,email,password,dob,gender,state,city,address,photo,role,status,votes) VALUES('$fname','$lname','$mobile','$email','$password','$dob','$gender','$state','$city','$address','$image','$role',0,0)");
    if($insert){
        echo'
        <script>
        alert("Registeration Successfully!!");
        window.location="../";
        </script>
        ';
    }
    else {
        echo'
        <script>
        alert("Some Error Occured!");
        window.location="../routes/register.html";
        </script>
        ';
    }
}
else{
    echo'
    <script>
    alert("Password and Confirm Password does not match!");
    window.location="../routes/register.html";
    </script>
    ';
}
?>