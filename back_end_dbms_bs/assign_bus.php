
<html>
<head>
	<link rel="stylesheet" type="text/css" href="layoutsstyle.css">
	<title>Bus Mangement System | Assign_bus</title>
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
      <div class="buses_remaining">
          <h2>Buses free to assign route:</h2>
          <?php 
              
          ?>
      </div>
    <form action="assign_bus-backend.php" method="POST" class ="a_adddetails">
    </form>
</body>
</html>