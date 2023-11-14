<?php 
    session_start();
    require_once('connect.php');
    
    if(!isset($_SESSION['staffID']))
    {
        header("Location: login.php");
    }
    else
    {
        $id = $_SESSION['staffID'];
        echo $_SESSION['staffID'];
        $info = $mysqli -> prepare("SELECT staff.*, type.typeName FROM staff JOIN type ON staff.typeID = type.typeID WHERE staffID = ?");
        $info -> bind_param("i", $id);
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
        $info->close();
        
    }
    if (isset($_POST['editsubmit'])) {
        // Extra all data from POST
        echo "<span>frdgdg</span>";
        $id2 = $_SESSION['patientID'];
        $firstname = $_POST['first-name'];
        $lastname = $_POST['last-name'];
        $gender = $_POST['gender'];
        $type = $_POST['type'];
        $dob = $_POST['date-of-birth'];
        $stat = $_POST['status'];
        

    
        $q = $mysqli -> prepare("UPDATE staff SET firstName=?,lastName=?,gender=?,dateOfBirth=?,avaStat=? WHERE staffID = ?");
        $q -> bind_param("sssssi", $firstname,$lastname,$gender ,$dob,$stat,$id2);
        ini_set('display_errors', 1);
                error_reporting(E_ALL);
        if($q->execute()) {
            $_SESSION['staffID'] = $id2;
            header('Location: view_profile.php');
    
        } else {
            header('Location: view_profile.php');
            echo "Select failed. Error: " .$mysqli->error;

        }
        $q->close();
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
        </div>
        <div class="signup-form">
            <h2 class="signup-heading"> Patient Profile </h2>

            <form action="editstaffforadmin.php" method="post">
            <input type="hidden" name="formType" value="editstaff"/>
                    <div class="form-group">
                        <label for="first-name">First Name:</label>
<?php                        echo "<input type='text' name='first-name' value=" .$userDetails['firstName'] . ">";
?>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name:</label>
                        <?php       echo "<input type='text' name='last-name' value=" .$userDetails['lastName'] . ">";
?>                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <?php        echo "<input type='text' name='gender' value=" .$userDetails['gender'] . ">";
?>                    </div>
                        <div class="form-group">
                        <label for="type">Type:</label>
                        <?php                        echo "<input type='text' name='type' value=" .$userDetails['type'] . ">";
?>                    </div>
                    <div class="form-group">
                        <label for="date-of-birth">Date of Birth:</label>
                        <?php                        echo "<input type='text' name='date-of-birth' value=" .$userDetails['dateOfBirth'] . ">";
?>                    </div>
                    
                    
                            <div class="form-group">
                        <label for="status">Status:</label>
                        <?php                        echo "<input type='text' name='status' value=" .$userDetails['avaStat'] . ">";
?>                    </div>
                    
                    <div class="form-groupmy">
                        <button type="submit" name="editsubmit" >Submit</button>
                        <button type="submit" name="editCancel" >Cancel</button>
                    </div>
                </div>
               
            </form>
        </div>
    </div>
</body>
</html>