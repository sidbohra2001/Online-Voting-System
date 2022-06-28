<?php
include('./includes/header.php');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap1.css">
    <title>Sign up for Online Voting System</title>
    <?php
    if (isset($_POST["submit"]) && isset($_POST["robot"])) {
        $server = "localhost";
        $username = "root";
        $pass = "";
        $db = "miniproject";
        $con = mysqli_connect($server, $username, $pass, $db);
        if (!$con) {
            die("Connection to the database failed due to : " . mysqli_connect_error());
        }
        $q1 = "SELECT * FROM state1 WHERE voterid = '" . $_POST["voterid"] . "' AND fname = '" . $_POST["fname"] . "' AND name = '" . $_POST["name"] . "' AND phone = '" . $_POST["mobile"] . "' AND aadhar = '" . $_POST["aadhar"] . "'";
        $r1 = mysqli_query($con, $q1);
        if (mysqli_num_rows($r1) > 0) {
            $q2 = "INSERT INTO login_details (voterid, password) VALUES('" . $_POST["voterid"] . "','" . $_POST["password"] . "')";
            if (mysqli_query($con, $q2)) {
                header("location: login.php");
            } else {
                echo "<script>alert('Error in Uploading Data')</script>";
            }
        } else {
            echo "<script>alert('Provided data does not match any records in the database !!!')</script>";
        }
    }
    ?>

</head>

<body style="font-family: verdana;">
    <div class="row" id="loginrow" style="background-image: linear-gradient(to bottom right,rgba(70, 102, 219, 0.5),rgba(242, 148, 48, 0.62), rgb(240, 54, 239,0.2)); background-position: center; margin-top: 50px;">
        <div class="col-md-7 mt-5" style="margin: 80px; max-width: 50%">
            <img src="assets/images/parliament.jpg" style="z-index: -1; opacity:0.6;">
        </div>
        <div class="col-md-4 m-4" style="margin: 80px; max-width: 50%; background: white;">
            <form class="m-3" method="POST" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Voter ID</b></label>
                    <input type="text" class="form-control" id="voterid" name="voterid" aria-describedby="emailHelp" required>
                    <small id="emailHelp" class="form-text text-muted"><b>We will never share your Voter ID with anyone.</b></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><b>Password</b></label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><b>Confirm Password</b></label>
                    <input type="password" class="form-control" name="cpassword" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Voter's Name</b></label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Father's Name</b></label>
                    <input type="text" class="form-control" id="fname" name="fname" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Mobile Number</b></label>
                    <input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Aadhar Number</b></label>
                    <input type="text" class="form-control" id="aadhar" name="aadhar" maxlength="12" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="robot" required>
                    <label class="form-check-label" for="exampleCheck1">I am not a robot.</label>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

<?php
include('./includes/footer.php');
?>