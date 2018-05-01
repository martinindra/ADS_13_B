<?php
    include'koneksi.php';
    if(isset($_POST['register'])){
        $fn = $_POST['firstname'];
        $ln = $_POST['lastname'];
        $name = $_POST['name'];
        $users = $_POST['user'];
        $passs = md5($_POST['pass']);
        $messeg = "";

        if(empty($fn)||empty($ln)||empty($name)||empty($users) || empty($passs)) {
            $messeg = "Username/Password con't be empty";
        } else {
            $sql = "INSERT INTO profile(FirstName,LastName,name,username,password,registration)values($fn,$ln,$name,$users,$passs,now()";
            $stmt = $conn->prepare($sql);
            $gapopo = array(
                "name" => $name,
                "FirstName" => $fn,
                "LastName" => $ln,
                "username" => $users,
                "password" => $passs
            );
            $stmt->execute($gapopo);
            
            //$query->execute(array($name,$fn,$ln,$users,$passs));
            //if($query === TRUE){
                echo("<script type='text/javascript'>alert('Submit Success');</script>");
                echo "<script type='text/javascript'> document.location ='login.php';</script>";
            $stmt = null;
            //}else{
           //     echo("<script type='text/javascript'>alert('Submit ERROR!!!');</script>");
            //}
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
    <div class="register-photo">
        <div class="form-container">
            <form method="post">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group">
                    <input class="form-control" type="text" name="firstname" placeholder="First Name" required>
                    <input class="form-control" type="text" name="lastname" placeholder="Last Name" required>
                    <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                    <input class="form-control" type="text" name="user" placeholder="Username" required>
                    <input class="form-control" type="password" name="pass" placeholder="Password" required>
                    <input class="form-control" type="password" name="password-repeat" placeholder="Confrim Password" required>
                </div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" required>I agree to the license terms.</label></div>
                </div>
                <div class="form-group"><button name="register" class="btn btn-primary btn-block" type="submit">Sign Up</button></div><a href="login.php" class="already">You already have an account? Login here.</a></form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider1.js"></script>
</body>

</html>