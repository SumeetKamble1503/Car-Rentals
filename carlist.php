<!-- <link rel = "stylesheet" href = "signup.css"> -->
<link rel = "stylesheet" href = "admin.css">
<?php 
    session_start(); 

    if($_SESSION['loggedin'] == true){
        // $avatar = $_SESSION['avatar'];       
        // $username = $_SESSION['username'];             
        // echo $avatar;
        // echo $username;
        //die();
    }
    else{   
        header("location: login.php");
    }
                                  
           
?>
<html>
    <head>
        <link rel = "stylesheet" href = "admin.css">
    </head> 
    <body>
        <div class="mainpage">
            <div class="navbar">
                        <ul>
                            <li ><a href="admin.php"> Admin Home </a></li>
                            <li><a href="alltrips.php"> All Trips </a></li>
                            <li> <a href="addcars.php"> Add Cars </a></li>
                            <li class="active"> <a href="carlist.php"> Cars List </a></li>
                            <li> <a href="addoffers.php"> Add Offers </a></li>
                            <li> <a href="offerlist.php"> Offers List </a></li>
                        </ul>
            </div>
            <div class="navbar2">
                    <ul class="nav">
                    <li><img class="image"  src = '<?= $_SESSION['avatar'] ?>' width="50" height="50" style="border: 1px solid black" > </li>    
                    <li class ="reference"><b>Currently Logged in as : </b><div class = "profilename"> <b><?= $_SESSION['username'] ?></b> </div> </li>
                        <li><a href="logout.php"> Logout </a></li>
                    </ul>
            </div>
            <h1>ADMIN HOMEPAGE</h1>
            <br><br><br>
            <div class="lists">
                <div class="carlist">
                    <?php 
                        include 'functionsignup.php';
                        session_start();
                                
                        $str = "SELECT * from cars";
                        $result=ExecuteQuery($str);
                        // $row = mysqli_fetch_assoc($result);
                        $no_rows = mysqli_num_rows($result);
                        if($result){
                            echo "<h2>  No. of Cars Registered : ";
                            echo $no_rows;
                            echo "</h2>";
                            echo "<br/>";
                            echo "<hr>";
                            echo "<br/>";
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<div class='single'>";
                                $carid = $row['carid'];
                                $avail = $row['availability'];
                                $carname = $row['carname'];
                                $carnum = $row['carnum'];
                                $carimage_path = $row['carpic'];
                                $cardist = $row['cardist'];
                                $carrating = $row['carrating'];
                                // echo $carimage_path;
                                echo "Car ID : ";
                                echo $carid;
                                echo " <b>|</b> ";
                                echo "Car Name : ";
                                echo $carname;
                                echo " <b>|</b> ";
                                echo "Car Number Plate : ";
                                echo $carnum;
                                echo " <b>|</b> ";
                                echo "Car Rating : ";
                                if($carrating == 0){
                                    echo "NULL";
                                }
                                else{
                                    echo $carrating;
                                }
                                echo " <b>|</b> ";
                                echo "Distance Travelled : ";
                                echo $cardist;
                                echo " <b>|</b> ";
                                echo "Car Availability (A/B) : ";
                                echo $avail;
                                echo " <b>|</b> ";
                                echo "<img class='carimg' src='$carimage_path' width= '50' height='50' style='border: 1px solid black'>";
                                echo "<br/><br/>";
                                echo "</div>";
                            }
                            
                          
                        }
                        else{
                            echo "<h2> No. of Cars Registered : 0 </h2>";
                        }
                    ?>
                </div>
            </div>
        </div>
        
    </body>
    
</html>



        
