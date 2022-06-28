<?php
include('./includes/header.php');
if (isset($_SESSION['admin_data']['empid'])) {
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
            $q1 = "UPDATE candidates SET party = '" . $_POST["pname"] . "', cimage = '" . $_POST["cimage"] . "', pimage = '" . $_POST["pimage"] . "', goals = '" . $_POST["goals"] . "', age = '" . $_POST["age"] . "' WHERE name = '" . $_POST["name"] . "'";
            if (mysqli_query($con, $q1)) {
                header("location: adminpage.php");
            } else {
                echo "<script>alert('Error in Uploading Data')</script>";
            }
        }
        ?>
    </head>

    <body style="font-family: verdana;">
        <div class="container mt-4 shadow-lg p-3 mb-5 rounded" style="background-image: url('assets/images/cal.jpg'); background-position: center" id="loginrow">
            <center>
                <h1><b>Update Candidate</b></h1>
            </center>
            <div class="row justify-content-center mt-3" style="margin: 80px; max-width: 50%; background: white;">
                <div class="col-md-8">
                    <form class="m-3" method="POST" action="">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><b>Candidate's Name</b></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><b>Party Name</b></label>
                            <input type="text" class="form-control" id="pname" name="pname" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><b>Candidate's Image</b></label>
                            <input type="text" class="form-control" id="cimage" name="cimage" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><b>Party's Image</b></label>
                            <input type="text" class="form-control" id="pimage" name="pimage" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><b>Goals</b></label>
                            <input type="text" class="form-control" id="goals" name="goals" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><b>Age</b></label>
                            <input type="text" class="form-control" id="age" name="age" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="robot" required>
                            <label class="form-check-label" for="exampleCheck1">I am not a robot.</label>
                        </div>
                        <center><button name="submit" type="submit" class="btn btn-primary">Submit</button></center>
                    </form>
                </div>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>

<?php
    include('./includes/footer.php');
} else {
    header("location: admin_login.php");
}
?>