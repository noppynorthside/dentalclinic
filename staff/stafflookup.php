<?php
session_start();
if(!isset($_SESSION['staffID']))
{
    header('Location: ../login.php');
} 
?>
<!DOCTYPE html>
<html>
<head>
    <title> Dentiste </title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="logo-containersignup">
        </div>
        <div class="signup-form">
            <h2 class="signup-heading"> Account Lookup </h2>

            <form action="stafflookupresult.php" method="post">
                    <div class="form-group">
                        
                        <input type="text" id="SearchText" name="SearchText" >
                  
                    </div>
                    <input type="submit" name="searchbutton" value="Search">
                    </form>
                    <form action="staffmain.php" method="post">
                <input type="submit" name="backbutton" value="Back"  >
</form>
                
            
        </div>
    </div>
</body>
</html>
