<?php 
    session_start();
    require_once('connect.php');
    if(!isset($_SESSION['patientID']))
    {
        header("Location: login.php");
    }
    elseif(isset($_POST['myappointments'])){
        header("Location: myapp.php");
        exit;
    }
    elseif(isset($_POST['dentalrecords'])){
        header("Location: dentalrecords.php");
        exit;
    }
    elseif(isset($_POST['billinghistory'])){
        header("Location: billinghis.php");
        exit;
    }
    else
    {
        $id = $_SESSION['patientID'];
        $info = $mysqli -> prepare("SELECT AES_DECRYPT(firstName,?) as firstName,AES_DECRYPT(lastName,?) as lastName,AES_DECRYPT(nationalID,?) as nationalID,AES_DECRYPT(telephone,?) as telephone,gender,AES_DECRYPT(houseAddress,?) as houseAddress,dateOfBirth FROM patient WHERE patientID = ?");
        $info -> bind_param("sssssi",$key,$key,$key,$key,$key,$id);
        if($info->execute()) {
            $result = $info->get_result();
            if($result->num_rows > 0) {
                $userDetails = $result->fetch_assoc();
            } else {
                echo "No records found.";
            }
        } else {
            echo "Select failed. Error: " . $mysqli->error;
        }
        
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title> Dentiste </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="logo-containersignup">
            <div class="form-groupmyprof1">
                <form action ="myapp.php" method="post">
                <div class="form-groupmyprof">
                    <button type="submit" name="myappointments" >My Appointments</button>
                </div> </form>
                <form action="dentalrecords.php" method="post">
                <div class="form-groupmyprof">
                    <button type="submit" name="dentalrecords" >Dental Records</button>
                </div></form>
                <form action="billinghis.php" method="post">
                <div class="form-groupmyprof">
                    <button type="submit" name="billinghistory" >Billing History</button>
            </div></form>
        </div>
    </div>
        <div class="signup-form">
            <h2 class="signup-heading"> My profile</h2>

            <form action="dentalIndex.php" method="post">
                    <input type = "hidden" name="formType" value="myprofile"/>
                    <div class="form-group">
                        <label for="first-name">First Name:</label>
                        <?php echo '<label>'.$userDetails['firstName'].'</label>'; ?>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name:</label>
                        <?php echo '<label>'.$userDetails['lastName'].'</label>'; ?>
                    </div>
                    <div class="form-group">
                        <label for="natid">National ID:</label>
                        <?php echo '<label>'.$userDetails['nationalID'].'</label>'; ?>
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <?php echo '<label>'.$userDetails['gender'].'</label>'; ?>

                    </div>
                    <div class="form-group">
                        <label for="date-of-birth">Date of Birth:</label>
                        <?php echo '<label>'.$userDetails['dateOfBirth'].'</label>'; ?>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Telephone:</label>
                        <?php echo '<label>'.$userDetails['telephone'].'</label>'; ?>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <?php echo '<label>'.$userDetails['houseAddress'].'</label>'; ?>
                    </div>
                    
                    <div class="form-groupmy">
                        <button type="submit" name="edit" >Edit</button>
                        <button type="submit" name="myprofexit" >Return</button>
                    </div>
                </div>
               
            </form>
        </div>
    </div>
</body>
</html>