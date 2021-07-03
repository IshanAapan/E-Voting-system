<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

  //  if($_SESSION['userdata']['status']==0){
   //    $status = '<b> style="color:red;">Not Voted</b>';
    //}
   // else {
     //   $status = '<b> style="color:green;">Voted</b>';
    //}
?>
<html>
<head>
<title>Online Voting System-Dashboard</title>
</head>
<body>
<!--<button>Back</button>
<button>Logout</button>
<h1><B><I> Online Voting System</I></B></h1>-->
<div class="content">
    <div class="header">
            <a href="../"><input type="button" id="backButton" name="back" value="Back">
            <label for="text">Online Voting System</label>
            <a href="logout.php"> <input type="button" id="logOut" name="logout" value="Logout">
    </div>
 <hr>
 
 <div class="line"></div>

<div class="container">
    <fieldset id="user">
        <div class="pfp">
            <img src="pfp.png" alt="profile picture">
        </div>
        <div class="info">
            <div class="name">
                <b><label for="name">Name:</label></b> <?php echo $userdata['fname'] ?>
            </div>
            <div class="mobile">
                <b><label for="mobile">Mobile:</label></b> <?php echo $userdata['mobile'] ?>
            </div>
            <div class="address">
                <b><label for="address">Address:</label></b> <?php echo $userdata['address'] ?>
            </div>
           <!-- <div class="status">
                <b><label for="status">Status:</label></b> <?php echo  $status ?>
            </div> -->
</div>
   </fieldset>
   <fieldset id="groups">
                <div class="group1">
                    <?php
                    if($_SESSION['groupsdata']){
                        for($i=0; $i<count($groupsdata); $i++){
                    ?>
                    <div>
                    <img src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
                    <div class="grpName">
                        <b><label for="groupName">Group Name:</label> <?php echo $groupsdata[$i]['fname']?></b>
                    </div>
                    <div class="vote">
                        <b><label for="votes">Votes:</label> <?php echo $groupsdata[$i]['votes']?></b>
                    </div>
                    <form action="../api/vote.php" method="POST">
                    <div class="button">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>" id="button">
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                        <?php
                            if($_SESSION['userdata']['status']==0){
                                ?>
                                 <input type="submit" name="votebtn" value="Vote" id="button">
                                <?php
                            }
                            else {
                                ?>
                                 <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                                <?php
                            }
                        ?>
                        </form>
                    </div>
                <hr>
        </fieldset>
                        </div>                       
</div>
                   
</body>
</html>