<?php

function sanitize($input) {
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

session_start();
include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM users WHERE Id = $id");

while ($result = mysqli_fetch_assoc($query)) {
    $res_Uname = sanitize($result['Username']);
    $res_Email = sanitize($result['Email']);
    $res_Number = sanitize($result['Number']);
    $res_id = $result['Id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style.css">

    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Profile Information</a></p>
        </div>
        <div class="right-links">
            <a href='edit.php?Id=<?php echo $res_id ?>'>Change Profile</a>
            <a href="php/logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <main>
        <div class="container1">
            <div class="box">
                <header>Hello <b><?php echo $res_Uname ?></b>, Welcome!</header>
                <div class="field">
                    <label>Your email:</label>
                    <p><?php echo $res_Email ?></p>
                </div>
                <div class="field">
                    <label>Your Number:</label>
                    <p><?php echo $res_Number ?></p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
