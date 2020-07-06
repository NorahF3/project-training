<?php 

  // connect to database
  $conn = mysqli_connect('localhost','admin_1','test1234','robot_movement');

  //check connection
  if(!$conn){
    echo "Connection error: " . mysqli_connect_error();
  }

            //if press Save button
         if(isset($_POST['Save'])){

            // input from user
              $rightDis = $_POST['RightDis'];
              $leftDis = $_POST['LeftDis'];
              $forwordsDis = $_POST['ForwordsDis'];

            // write query for movment
          $sql ="INSERT INTO autocontrol(MoveRight, MoveForward, MoveLeft) VALUES ('$rightDis', '$forwordsDis', '$leftDis')";
            if(mysqli_query($conn,$sql)){
                //success
                }else{
                    //error
                    echo "query error: " . mysqli_error($conn);
                  }
            // close connection
            mysqli_close($conn);

          }//end Save button


         //if press Delete button
          if(isset($_POST['Delete'])){
          //$last_id = mysqli_insert_id($conn);

            //create sql
            //$sql = 'SELECT MoveRight, MoveForward FROM autocontrol where id = $last_id';
            $sql2 = "DELETE FROM autocontrol WHERE id = (SELECT MAX(id) FROM autocontrol)";

            if(mysqli_query($conn,$sql2)){
                //success
                }else{
                    //error
                    echo "query error: " . mysqli_error($conn);
                  }
            // close connection
            mysqli_close($conn);

          } //end Delete button
      ?>

<!DOCTYPE html>
<html>
  <head>
  <title>Control Panel</title>
  <link rel="stylesheet" type="text/css" href="style_3.css">
 <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  </head>
  
  <body >
  	 <img src="logo.png" alt="logo" style="width:200px;height:100px"; id="corner">

  	  <div class="bigbox">
  		<p>ROBOT CONTROL PANEL</p>
  		<hr>
  		<form class="container" action="Auto_Control2.php" method="POST">

  			<ul >
  			  <li class="textbox">
              <input type="number" name="RightDis" value=0></input>
              <button  type="submit" name="Right" class="button ">Right</button>
            </li>

    			<li class="textbox">
              <input type="number" name="ForwordsDis" value=0>
              <button type="submit" name="Forwords" class="button ">Forwords</button>

    			</li>

    			<li class="textbox">
            <input type="number" name="LeftDis" value=0>
            <button type="submit" name="Left" class="button ">Left</button>

          </li>

          <li class="container2" >
            <button type="submit" name="Save" class="button">Save</button>
            <button type="submit" name="Delete" class="button">Delete</button>
            <button type="submit" name="Start" class="button">Start</button>
        </li>
  			</ul>

<div class="container3">
        <table>

    <?php  
           //if press Start button
          if(isset($_POST['Start'])){

            //create sql
            //$sql = 'SELECT MoveRight, MoveForward FROM autocontrol where id = $last_id';
            $sql3 = 'SELECT MoveRight, MoveForward,MoveLeft FROM autocontrol ORDER by id DESC LIMIT 1';

            // make query & get result
            $result = mysqli_query($conn, $sql3);

            $row = mysqli_fetch_array($result);
     ?>
           <tr>
             <th>MOVE</th>
             <th>DISTANCE</th>
           </tr>
            <tr>
                <th class="redC">Right</th>
                <td><?php echo $row[0] . " km"; ?></td>
            </tr>
            <tr >
                <th class="blueC">Forward</th>
                <td><?php echo $row[1] . " km"; ?></td>
            </tr>
            <tr>
                <th class="greenC" >Left</th>
                <td><?php echo $row[2] . " km"; ?></td>
            </tr>
            

        </table>
  	</div>	

  	 <!-- <img src="img11.jpeg" alt="robot image" style="width:250px;height:300px;   flex: 100%"; > -->
      <div class="container4">
      <p>MAP</p>
        <canvas id="paper" width="200" height="200">
          <script >
            window.onload = function(){
              var canvas = document.getElementById("paper");
              c = canvas.getContext("2d");

              c.fillStyle = "white";
              c.fillRect(0 ,0 ,canvas.width , canvas.height);

<?php     if($row[0] != 0){ ?>

              // row to right
              c.strokeStyle ="red";
              c.lineWidth = 3;
              c.beginPath();
              c.moveTo(100, 150);
              c.lineTo(150, 150); // change 220(x) to change size
              c.stroke();
<?php 
          } // end row to right
          if($row[1] != 0){
?>
              // row to forward
              c.strokeStyle ="blue";
              c.lineWidth = 3;
              c.beginPath();
              c.moveTo(150, 150);
              c.lineTo(150, 90); // change 200(y) to change size
              c.stroke();
<?php 
          } // end row to forward
          if($row[2] != 0){
?>
              // row to left
              c.strokeStyle ="green";
              c.lineWidth = 3;
              c.beginPath();
              c.moveTo(150, 90);
              c.lineTo(100,90); // change 150(y) to change size
              c.stroke();

    <?php  
          } // end row to left

          // close connection
            mysqli_close($conn); 
            
        }//end Start button
    ?>

            };
          </script>
        </canvas>
      </div>


  		</form>
    </div>
  </body>
 </html>
