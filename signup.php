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
        <div class="formgroup">
            <h2 class="signup-heading"> Patient Sign Up </h2>

            <form action="dentalIndex.php" method="post">
                    <input type = "hidden" name="formType" value="signup"/>
                    <div class="form-group">
                        <label for="first-name">First Name:</label>
                        <input type="text" id="first-name" name="first-name" required>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name:</label>
                        <input type="text" id="last-name" name= "last-name" required>
                    </div>
                    <div class="form-group">
                        <label for="natid">National ID:</label>
                        <input type="text" id="natid" name= "natid" maxlength = "13" minlength = "13" required>
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label>
                    </div>
                    <div class="form-group">
                        <label for="date-of-birth">Date of Birth:</label>
                        <input type="date" id="date-of-birth" name="date-of-birth" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Telephone:</label>
                        <input type="text" id="telephone" name="telephone"  maxlength = "10" minlength = "10" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea id="address" name="address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Username">Username:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <?php
                        if (isset($_GET['error'])) {
                            echo '<p style="color: red;">' . htmlspecialchars($_GET['error']) . '</p>';
                        }
                    ?>
                    <div class="form-group">
                        <label for="passrord">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="conpasswd">Confirm Password:</label>
                        <input type="password" id="conpasswd" name="conpasswd" required>
                    </div>
                    
                    <input type="submit" name="signupbutton" value="Sign Up"> 
                    <input type="submit" name="backbutton" value="Back"onClick="window.location='login.php';">
                   
            </form>
        </div>
    </div>
</body>
</html>
