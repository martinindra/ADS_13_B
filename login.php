<?php
    include'koneksi.php';
    if(isset($_POST['login'])){
        $users = $_POST['user'];
        $passs = md5($_POST['pass']);
        $messeg = "";

        if(empty($users) || empty($passs)) {
            $messeg = "Username/Password con't be empty";
        } else {
            $sql = "SELECT username, password FROM profile WHERE username='$_POST[user]' AND password='$_POST[pass]'";
            $query = $conn->prepare($sql);
            $query->execute(array($users,$passs));
            if($query->rowCount() >= 1) {
                $_SESSION['user'] = $users;
                echo("<script type='text/javascript'>alert('Login Succes');</script>");
                echo "<script type='text/javascript'> document.location ='index.php';</script>";
            } else {
                $messeg = "Username/Password is wrong";
            }
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Boxed.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
    <link rel="stylesheet" href="assets/css/Team-Grid.css">
</head>

<body>
    <div class="login-dark" style="background-image:url(&quot;assets/img/SS2.jpg&quot;);height:658px;background-size:cover;background-position:top;">
        <form method="post" style="padding:18px;height:210px;">
            <h2 class="sr-only">Login Form</h2>
        </form>
        <form method="post" style="padding:18px;height:189px;">
            <h2 class="sr-only">Login Form</h2>
        </form>
        <form method="post" style="padding:18px;height:227px;">
            <h2 class="sr-only">Login Form</h2>
            <div class="form-group"><input class="form-control" type="text" name="user" placeholder="Username" required></div>
            <div class="form-group"><input class="form-control" type="password" name="pass" placeholder="Password" required></div>
            <div class="form-group"><button name="login" class="btn btn-primary btn-block" type="submit">Log In</button></div><a href="register.php" class="forgot" style="margin:8px;padding:-56px;">Don't Have Account? Click Here</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider1.js"></script>
</body>

</html>