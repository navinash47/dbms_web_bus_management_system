
<html>
<head>
	<link rel="stylesheet" type="text/css" href="layoutsstyle.css">
	<title>Bus Mangement System | AddRoute</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
	<style>
		
			a:link, a:visited {
  background-color: #2196F3;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 25px;
  margin-right:  10px;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    font-family: "Comic Sans MS", cursive, sans-serif;
}
a:hover, a:active {
  background-color: #0b7dda;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
		
	</style>
</head>
    <body>
    	<div class="header">
    		<h1>Bus Booking Platform<-AddStation</h1>

        <div class="admins_top_nav">

          <form action="add_station.php" method="POST" class="a_topnav">
            <button class="a_add_station" type="submit">Add Station</button>
          </form>
          <form action="add_model.php" method="POST" class="a_topnav">
            <button class="a_add_model" type="submit">Add Model</button>
          </form>
          <form action="add_bus.php" method="POST" class="a_topnav">
            <button class="a_add_bus" type="submit">Add Bus</button>
          </form>
          <form action="add_route.php" method="POST" class="a_topnav">
            <button class="a_add_route" type="submit">Add Route</button>
          </form>
          <form action="assign_bus.php" method="POST" class="a_topnav">
            <button class="assign_bus" type="submit">Assign Bus</button>
          </form>
          <form action="admin_login.php" method = "POST" class="a_topnav">
            <button class="a_logout" type="submit">Logout</button>
          </form>

    	  </div> 

    </div>
    <form id="route_details">
      <center>
            <div class="field-wrap">
                <label>
                    Route_id<span class="req">*</span>
                </label>
                <input type="number" required autocomplete="off" name="route_id"/>
            </div>

            <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <td>
                        <!--div class="top-row"-->
                        
                        <div class="field-wrap">
                            <label>
                                Station Code<span class="req">*</span>
                            </label>
                            <!-- <input type="text"required autocomplete="off" name="station_code[]"/> -->
                            <select id="stations" name="station_code[]" form="route_details">
                            <?php 
                              require_once "dbconnect.php";
                              $query="SELECT * FROM Station ORDER BY Station_Name";
                              $result = mysqli_query($con, $query);
                              $numResults = mysqli_num_rows($result);

                              if($numResults==0){
                                echo'<center><h3 style="color:white;background-color:#333;">No Stations created create_new!</h3></center>';
                                require_once "add_station.php";
                                // echo "<form action=\"add_model.php\" method =\"POST\" class=\"if_no_models\"><button class=\"btn success\" type = \"submit\">Create Model</button></form>"
                              }
                              else{
                              while ($row=mysqli_fetch_array($result)) {
                                  //printf("ID: %s  Name: %s", $row[0], $row[1]);  
                                  echo "<option value=\"{$row[0]}\">{$row[0]}-{$row[2]}</option>";
                              }
                            }
                            ?>
                            </select>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Distance From Source<span class="req">*</span>
                            </label>
                            <input type="number"required autocomplete="off" name="distance_from_source[]"/>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Time From Source<span class="req">*</span>
                            </label>
                            <input type="number"required autocomplete="off" name="time_from_source[]"/>
                        </div>
                    </td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
                </tr>
            </table>
            <input type="button" name="submit" id="submit"  class="btn btn-info" value="Submit" />
            </center>
        </form>
</body>
</html>

<script>
  $(document).ready(function(){
      var i = 1;
      $('#add').click(function(){
          i++;
          $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="field-wrap"><label>Station Code<span class="req">*</span></label><select id="stations" name="station_code[]" form="route_details"><?php require_once "dbconnect.php";$query="SELECT * FROM Station ORDER BY Station_Name";$result = mysqli_query($con, $query);$numResults = mysqli_num_rows($result);if($numResults==0){echo'<center><h3 style="color:white;background-color:#333;">No Stations created create_new!</h3></center>';require_once "add_station.php";}else{while ($row=mysqli_fetch_array($result)) {echo "<option value=\"{$row[0]}\">{$row[0]}-{$row[2]}</option>";}}?></select></div><div class="field-wrap"><label>Distance From Source<span class="req">*</span></label><input type="number"required autocomplete="off" name="distance_from_source[]"/></div><div class="field-wrap"><label>Time From Source<span class="req">*</span></label><input type="number"required autocomplete="off" name="time_from_source[]"/></div></td></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });

      $(document).on('click','.btn_remove', function(){
          var button_id = $(this).attr("id");
          $("#row"+button_id+"").remove();
      });

      $('#submit').click(function(){
          $.ajax({
              async: true,
              url: "add_route-backend.php",
              method: "POST",
              data: $('#route_details').serialize(),
              success:function(rt)
              {
                  alert(rt);
                  $('#route_details')[0].reset();
              }
          });
      });
  });
</script>