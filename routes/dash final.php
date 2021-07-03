<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location: ../");
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if ($userdata['status'] == 0) {
    $status = '<b style="color:red">Not Voted</b>';
} else {
    $status = '<b style="color:green;">Voted</b>';
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="dashStyleFinal.css">
</head>

<body>
	<div class='main'>
    <div class="content">
        <div class="header">
            <a href="../"><button id="backButton" name="back">Back</button></a>
            <label for="text">Online Voting System</label>
            <a href="logout.php"><button id="logOut" name="logout">Logout</button></a>
        </div>

        <div class="container">
            <div class="userInfo">
                <fieldset id="user">
                    <div class="pfp">
                        <img src="../uploads/<?php echo $userdata['photo'] ?>">
                    </div>
                    <div class="info">
                        <div class="name">
                            <label for="name">Name:</label>
                            <label for="Name">
                                <?php echo $userdata['fname'].' '. $userdata['lname'] ?>
                            </label>
                        </div>
                        <div class="mobile">
                            <label for="mobile">Mobile:</label>
                            <label for="mob">
                                <?php echo $userdata['mobile'] ?>
                            </label>
                        </div>
                        <div class="address">
                            <label for="address">Address:</label>
                            <label for="add">
                                <?php echo $userdata['address'] ?>
                            </label>
                        </div>
                        <div class="status">
                            <label for="status">Status:</label>
                            <label for="stat">
                                <?php echo $status ?>
                            </label>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="groupInfo">
                <?php
									if ($_SESSION['groupsdata']) {
										for ($i = 0; $i < count($groupsdata); $i++) {
								?>
                <fieldset id="groups">
                    <div class="groupPfp">
                        <img src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>">
                    </div>
                    <div class="grpName">
                        <label for="groupName">Group Name:</label>
                        <label for="gName">
                            <?php echo $groupsdata[$i]['fname'] .' '. $groupsdata[$i]['lname'] ?>
                        </label>
                    </div>
                    <div class="vote">
                        <label for="votes">Votes:</label>
                        <label for="numVotes">
                            <?php echo $groupsdata[$i]['votes'] ?>
                        </label>
                    </div>
                    <div class="button">
                        <form action="../api/vote.php" method="POST">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                            <?php
                                    if ($_SESSION['userdata']['status'] == 0) {
                                    ?>
                            <input type="Submit" name="votebtn" value="Vote" id="votebtn">
                            <?php
                                    } else {
                                    ?>
                            <button disabled name="votebtn" value="Vote" id="voted"></button>
                            <?php
                                    }
                                    ?>
                        </form>
                    </div>
								</fieldset>
            <!-- </div> -->
				<?php
										} 
									}
				?>
        </div>
         <!-- <?php
                    //     }
                    // } else {
                    //     # code...
                    // }
?> -->
    </div>
		</div>
</body>

</html>