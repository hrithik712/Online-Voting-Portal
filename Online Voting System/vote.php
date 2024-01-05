<?php
session_start();
include('connect.php');
$votes = $_POST['gvotes'];
$total_votes = $votes+1;
$gid = $_POST['gid'];
$uid = $_SESSION['userdata']['id'];


$update_votes = mysqli_query($connect, "UPDATE users SET votes='$total_votes' WHERE id='$gid'");
$update_user_status = mysqli_query($connect, "UPDATE users SET status=1 WHERE id='$uid'");

if($update_votes and $update_user_status){
    $groups = mysqli_query($connect, "SELECT id, name, votes, photo FROM users WHERE role=2");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata']['status'] = 1;
    $_SESSION['groupsdata'] = $groupsdata;
    echo '
    <script>
        alert("Voting Successfull!");
        window.location = "dashboard.php";
    </script>';

}
else{
    echo '
        <script>
            alert("Some error occured!");
            window.location = "dashboard.php";
        </script>';
}

?>