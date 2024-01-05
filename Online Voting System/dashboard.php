<?php
session_start();
if(!isset($_SESSION['userdata'])){

     header("location: ../");
}
$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

//if($_SESSION['userdata']['status'] ==0){
    if($userdata['status']==0){
    $status = '<b style = "color:red"> Not Voted</b>';

    }
    else{
        $status='<b style="color:green"> Voted</b>';
    }
//    $status='<b style = "color:red"> Not Voted </b>';
//}
//else{
//    $status='<b style = "color:green"> Voted </b>';
//}


//if($_SESSION['userdata']['status']==1){
  //  $status = '<b style="color: green">Voted</b>';
//}
//else{
  //  $status = '<b style="color: red">Not Voted</b>';
//}

?>
<html>
    <head>
        <title>Online Voting System - Dashboard</title>
        <link rel="stylesheet" href="CSS/style2.css">

    </head>
    <body>
        <style>
            #backbtn{
                padding: 10px;
                border-radius: 5px;
                background-color: #48dbfb;
                color: green;
                float: left;
                margin: 15px;
            }
            #Logoutbtn{
                padding: 10px;
                border-radius: 5px;
                background-color: #48dbfb;
                color: green;
                float: right;
                margin: 15px;
            }

            #Profile{
                background-color: #FFFAF0;
                width: 30%;
                padding: 25px;
                float: left;
            }

            #Group{
                background-color: #FFFAF0;
                width: 60%;
                padding: 25px;
                float: right;

            }
            #votebtn{
                padding: 10px;
                border-radius: 5px;
                background-color: #48dbfb;
                color: green;
                float: left;

            }
            #mainpanel{
                padding: 15px;

            }
            #voted{
                padding: 10px;
                border-radius: 5px;
                background-color: green;
                color: green;
                float: left;

            }

          

        </style>
        <div id="mainSection">
            <center>
            <div id ="headerSection">
                <a href="../"><button id="backbtn">   Back</button> </a>
                <a href ="logout.php"><button id="logoutbtn">Logout</button><a>
                <h1>Online Voting System</h1>   
            </center>      
        <hr>
        <div id="mainpanel">
        <div id="Profile">
            <center><img src="uplaods/<?php echo $userdata['photo']?>" height="100" width="100"></center><br><br>
            <b>Name: </b> <?php  echo $userdata['name'] ?><br><br>
            <b>Mobile: </b><?php  echo $userdata['mobile'] ?><br><br>
            <b>Address: </b><?php  echo $userdata['address'] ?><br><br>
            <b>Status: </b><?php  echo $status ?><br><br>     
        </div>
        <div id="Group">
            <?php
            if($_SESSION['groupsdata']){
                for($i=0; $i<count($groupsdata); $i++){ 
                    ?>                    
                   <div >
                        <img style="float: right "src="uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                        <b> Group Name: </b><?php echo $groupsdata[$i]['name']?><br><br>
                        <b> Votes: </b><?php echo $groupsdata[$i]['votes']?><br><br>
                        <form action="vote.php" method="POST">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]["votes"]?>">
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                            <?php
                            if($_SESSION['userdata']['status']==0){
                                ?>
                                <input type="submit" name="votebtn" value="vote" id="votebtn">
                                <?php
                            }
                            else{
                                ?>
                                <button disabled type="button" name="votebtn" value="vote" id = "voted">Voted</button>
                                <?php

                            }
                            ?>
                           
                        </form>    
                    </div>
                    <hr>
                    <?php
                    
                }

            }     
            else{

            }
            ?>
        </div>
    </body>
</html>