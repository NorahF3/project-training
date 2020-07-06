<?php 

  // connect to database
  $conn = mysqli_connect('localhost','admin_1','test1234','robot_movement');

  //check connection
  if(!$conn){
    echo "Connection error: " . mysqli_connect_error();
  }

  //create sql
  $sql ="INSERT INTO movement(move) VALUES ('S')";

  //if press Right button
    if(isset($_POST['Right'])){
      // write query for movment
     // $sql ="INSERT INTO movement(move) VALUES ('R')";
      $sql = "UPDATE movement SET move='R'";
  }

  //if press left button
    elseif(isset($_POST['Left'])){
      // write query for movment
     // $sql ="INSERT INTO movement(move) VALUES ('L')";
      $sql = "UPDATE movement SET move='L'";
  }

  //if press Forwords button
  elseif(isset($_POST['Forwords'])){
    // write query for movment
    //$sql ="INSERT INTO movement(move) VALUES ('F')";
    $sql = "UPDATE movement SET move='F'";

  }

  //if press backwords button
  elseif(isset($_POST['Backwords'])){
    // write query for movment
     // $sql ="INSERT INTO movement(move) VALUES ('B')";
    $sql = "UPDATE movement SET move='B'";

  }
  
  //if press Stop button
  elseif(isset($_POST['Stop'])){
    // write query for movment
    // $sql ="INSERT INTO movement(move) VALUES ('S')";
    $sql = "UPDATE movement SET move='S'";
  }


    if(mysqli_query($conn,$sql)){
    //success
    }else{
        //error
        echo "query error: " . mysqli_error($conn);
      }

    // close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
  <head>
  <title>Control Panel</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

  </head>
  
  <body >
  	 <img src="logo.png" alt="logo" style="width:200px;height:100px"; id="corner">
  	  <div class="bigbox">
  		<p>ROBOT CONTROL PANEL</p>
  		<hr>
  		<form class="container" action="ControlPanel.php" method="POST">

  			<ul>
  			<li><button  type="submit" name="Forwords" class="button  button2">Forwords</button></li>

  			<li class="container2" >
  				<button type="submit" name="Left" class="button button2 ">Left</button>
  				<button type="submit" name="Stop" class="button button3">Stop</button>
  				<button type="submit" name="Right" class="button button2 ">Right</button>
  			</li>

  			<li><button type="submit" name="Backwords" class="button button2 ">Backwords</button></li>
  			</ul>
  		
  	<!--	<img src="img2.png" alt="robot image" style="width:250px;height:300px"; > -->
  		</form>
    </div>
  </body>
 </html>