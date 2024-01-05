<?php
session_start();
include("connect.php");
$mobile = $_POST['mobile'];
$pass = $_POST['password'];
$role = $_POST['role'];
$check = mysqli_query($connect, "select * from users where mobile='$mobile' and password='$pass' and role='$role' ");
if(mysqli_num_rows($check)>0){
    $userdata = mysqli_fetch_array($check);
    $groups = mysqli_query($connect, "SELECT * FROM users WHERE role=2");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupsdata'] = $groupsdata;
        echo '
        <script>
            window.location = "dashboard.php";
        </script>
        ';
    }
    else{
        echo '
        <script>
            alert("Invalid credentials!");
            window.location = "login.html";
        </script>';
    }