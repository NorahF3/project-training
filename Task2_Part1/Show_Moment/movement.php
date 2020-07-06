<?php

  // connect to database
  $conn = mysqli_connect('localhost','admin_1','test1234','robot_movement');

  //check connection
  if(!$conn){
    echo "Connection error: " . mysqli_connect_error();
  }

    //create sql
    $sql = 'SELECT move FROM movement ';

    // make query & get result
    $result = mysqli_query($conn, $sql);

    //fetch the resulting rows as an array
    $moove=  mysqli_fetch_array($result);

  // close connection
  mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style >
    body{
      background-color: #c1f0f0;
      justify-content: center; 
      display: flex;
      color: #737373;
      font-size: 25px;
    }
    .bigbox{
      width: 150px;
      height: 150px;
      margin: 0px;
      margin-top:260px;
      padding: 0px;
      border-radius: 15px;
      background: #ffffff;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="bigbox">
    <h1 >
    	<?php
    		echo ($moove[0]);
    	?>
    </h1>
	</div>
</body>
</html>