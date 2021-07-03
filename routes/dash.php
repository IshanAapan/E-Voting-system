<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not Voted</b>';
     }
      else {
        $status = '<b style="color:green;">Voted</b>';
     }
 ?>

 <html>
     <head>
         <title>Online Voting System - Dashboard</title>
    </head>
    <body>
        <div class="content">
        <div class="header">
        <a href="../"><button id="backButton">Back</button></a>
        <a href="logout.php"><button id="logout">Logout</button></a>
            <h1>Online Voting System</h1>
        </div>
        <hr>
        <div class="container">
        <div id="user">
            <img src="../uploads/<?php echo $userdata['photo']?>" height="100" width="100"><br>
            <b>Name:</b><?php echo $userdata['fname']?> <br>
            <b>Mobile:</b><?php echo $userdata['mobile']?> <br>
            <b>Address:</b><?php echo $userdata['address']?> <br>
            <b>Status:</b><?php echo $status ?> <br>
        </div>
        <div id="groups">
            <?php
                if($_SESSION['groupsdata']){
                    for($i=0; $i<count($groupsdata); $i++){
            ?>
            <div>
                <img src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
                <b><Group Name:</b> <?php echo $groupsdata[$i]['fname']?> <br><br>
                <b><Votes:</b> <?php echo $groupsdata[$i]['votes']?><br><br>
                <form action"../api/vote.php" method="POST">
                    <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                    <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                    <?php
                        if($_SESSION['userdata']['status']==0){
                    ?>
                    <input type="Submit" name="votebtn" value="Vote" id="votebtn">
                    <?php
                    }
                    else {
                        ?>
                    <button disabled type="button" name="votebtn" value="Vote" id="voted"></button>
                    <?php
                    }
                    ?>
                </form>
            </div>
            <hr>
            <?php
                    }
                }
                else {
                    # code...
                }
            ?>
        
        </div>
        
       </div>
        
       </body>
</html>
    <!--$userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

      if($_SESSION['userdata']['status']==0){
      $status = '<b> style="color:red;">Not Voted</b>';
   }
    else {
      $status = '<b> style="color:green;">Voted</b>';
   }
?>-->