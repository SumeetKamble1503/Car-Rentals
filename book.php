<?php
    //echo $_GET['id'];
    session_start(); 
    if($_SESSION['loggedin'] == true){
        if($_SESSION['username'] == "admin" )
            {
                $_SESSION['loggedin'] = false;
                header("location: login.php");
            }
    }
    else{   
        header("location: login.php");
    }
    if($_GET['id']){
        $variable = $_GET['id'];
        //echo $variable;
    }
    else{

    }
   
?>

<html>
    <head>
        <link rel = "stylesheet" href = "bookacar.css">
        <link rel = "stylesheet" href = "profile.css">
        <!-- <link rel = "stylesheet" href = "admin.css"> -->
        <link rel="stylesheet" href="signup.css" type="text/css">
    </head> 
    <body>
        <div class="mainpage">
            <div class="navbar">
                <ul>
                    <li><a href="homepage.html"> Home </a></li>
                    <li><a href="profile.php"> Profile </a></li>
                    <li><a href="bookacar.php"> Book A Car </a></li>
                    <li class="active"><a href="book.php"> Booked</a></li>
                </ul>
            </div>
            <div class="navbar2">
                    <ul class="nav">
                        <li><img class="image"  src = '<?= $_SESSION['avatar'] ?>' width="50" height="50" style="border: 1px solid black" > </li>    
                        <li class ="reference"><b>Currently Logged in as : </b><div class = "profilename"> <b><?= $_SESSION['username'] ?></b> </div> </li>
                        <li><a href="logout.php"> Logout </a></li>
                    </ul>
            </div>
            <div class="bookedinfo">
                <?php 
                    include 'functionsignup.php';
                    // session_start();
                    // $current_timestamp = time();
                    //echo $current_timestamp;

                    // $time = DATE_TRUNC(‘[]’, time_column); 
                    $username = $_SESSION['username'];
                    // echo $username;

                    $str = "SELECT * from users where username = '$username' ";
                    $result=ExecuteQuery($str);
                    $row = mysqli_fetch_assoc($result);
                    // $no_rows = mysqli_num_rows($result);

                    $newid = $row['id'];
                    //echo $newid;
                    
                    $strr = "SELECT * from alltrips where userid = '$newid' and completed='U'";
                    $resultr = ExecuteQuery($strr);
                    $rowr = mysqli_fetch_assoc($resultr);
                    $no_rows = mysqli_num_rows($resultr);

                    if($no_rows == 1)
                    {
                        header("location: profile.php");
                    }
                    else
                    {
                        $mysqli = new mysqli('localhost' ,'root','', 'accounts');
                        $sql = "INSERT INTO alltrips (userid , carid ,completed)" . "VALUES ('$newid' ,'$variable' ,'U' )";
                        if($mysqli->query($sql) === true){

                            $str = "UPDATE cars SET availability ='B' where carid='$variable'";
                            $result = ExecuteQuery($str);


                            // $str = "SELECT * from bookedcars where carid = '$variable'";
                            // $result = ExecuteQuery($str);
                            // $row = mysqli_fetch_assoc($result);
                            
                            // $bookingid = $row['bookingid'];

                            // // echo $bookingid;

                            // $str = "INSERT INTO trips ( bookingid , completed )" . "VALUES ('$bookingid' ,'U')";
                            // $result=ExecuteQuery($str);
                            header("location: profile.php");
                        }
                        else{
                            echo $newid;
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>