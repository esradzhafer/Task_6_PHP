<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var number = document.getElementById("number").value;
            var password = document.getElementById("password").value;

            if (username === "" || email === "" || number === "" || password === "") {
                alert("All fields are required");
                return false;
            }

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email.match(emailPattern)) {
                alert("Invalid email format");
                return false;
            }

            if (isNaN(number) || number.length !== 10) {
                alert("Phone number should be a 10-digit number");
                return false;
            }

            if (password.length < 6) {
                alert("Password should be at least 6 characters long");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
                include("php/config.php");

                function sanitize($input) {
                    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
                }
                
                if(isset($_POST['submit'])){
                    $username = sanitize($_POST['username']);
                    $email = sanitize ($_POST['email']);
                    $number = sanitize ($_POST['number']);
                    $password = sanitize ($_POST['password']);

                    // Verifying the unique email

                    $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

                    if(mysqli_num_rows($verify_query) !=0 ){
                        echo "<div class='message'>
                                  <p>This email is used, Try another One Please!</p>
                              </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    }
                    else{
                        mysqli_query($con,"INSERT INTO users(Username,Email,Number,Password) VALUES('$username','$email','$number','$password')") or die("Error Occurred");

                        echo "<div class='message'>
                                  <p>Registration successfully!</p>
                              </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Login Now</button>";
                    }

                }else{
            ?>

            <header>Sign Up</header>
            <form action="" method="post" onsubmit="return validateForm()">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="number">Number</label>
                    <input type="number" name="number" id="number" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register">
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
