<!DOCTYPE html >
<html>
  <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Drivers Status</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <?php 
        include('db_connection.php');
        include('supervisor page.php');
        $Supervisor_ID=$_SESSION['Supervisor_ID'];
    ?>
      <div class="container">
        <h1>Driver Location</h1>
        </div>
      <?php
        if(isset($_POST['Driver_ID']))
  	    {
            $Driver_ID = $_POST["Driver_ID"];  
            $sql="SELECT * FROM drivers WHERE Driver_ID='$Driver_ID' and Supervisor_ID='$Supervisor_ID'";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($query);
            if($row){
                $sql2="SELECT * FROM vehicles_assigned WHERE Driver_ID='$Driver_ID'";
                $query2 = mysqli_query($con,$sql2);
                $row2 = mysqli_fetch_assoc($query2);
                echo "<br>";
                if(mysqli_num_rows($query2)>0){
                    // echo json_encode($row2);
                    $tosend = $Driver_ID;
                    echo "<table class='center' border='1' style='float:left;margin: 30px;'>
                    <tr>
                    <th><h1>Driver ID</th>
                    <th><h1>Name</h1></th>
                    <th><h1>Contact</h1></th>
                    </tr>";
                    //$row = mysqli_fetch_assoc($query);
                    echo "<tr>";       
                    echo "<td>" . $row['Driver_ID'] . "</td>";          
                    echo "<td>" . $row['Name'] . "</td>";         
                    echo "<td>" . $row['Contact'] . "</td>";                  
                    echo "</tr>";
                    echo "</table>";   
                    //Now the vehicle info
                    echo "<table class='center' border='1' style='margin:30px;'>
                    <tr>
                    <th><h1>Vehicle Number</h1></th>
                    </tr>";
                    echo "<tr>";
                    echo "<td>" .$row2['Vehicle_No'] . "</td>"; 
                    echo "</table>";
                }else{
                    echo "<p class='submitMsg'><b>Driver not assigned any vehicle<b></p>";
                }
            }
            else{
                echo "<p class='submitMsg'><b>Searched Driver Not Found!<b></p>";
            }
        }        
      ?>
    <body>
        <div class="container">
            <form action="view driver status.php" method="POST">
                <input style="width:200px;" type="text" name="Driver_ID" id="Driver_ID" placeholder="Enter Driver ID" maxlength=12 minlength=12 required>
                <button class="btn">View Status</button> 
                <br>
                <br>
            </form>
        </div>
    </body>
    <h1><center>Map</center></h1>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <body>
    <div id="map"></div>
    <!-- script part was here -->
  </body>
</html>
<script type="text/javascript">
    // alert("Driver ID (tosend is ): " + "<?php echo $tosend; ?>");
    //deleted from next line
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };
      var ajax = new XMLHttpRequest();
        var method = "GET";
        var url = "view driver status.php";
        var asynchronous = true;
        ajax.open(method,url,asynchronous);
        //sending ajax request
        ajax.send();
        //receiving response from mapdata.php
        var latitude;
        var longitude;
        ajax.onreadystatechange = function()
        {
          if(this.readyState == 4 && this.status== 200){
            var obj= <?php echo json_encode($row2); ?>;
            // alert(typeof(obj));
            var data = Object.keys(obj).map((key) => [String(key), obj[key]]);
            console.log(data);
            latitude=parseFloat(data[2][1]);
            longitude=parseFloat(data[3][1]);
            alert("latitude : "+latitude+" and longitude : "+longitude);
            // alert(typeof(latitude));
            // alert(typeof(longitude));
            initMap();
          }
        }
      function initMap() {
        // alert("latitude is : "+typeof(latitude));
        // alert("longitude is : "+typeof(longitude));
        var map = new google.maps.Map(document.getElementById('map'), {
            
        // center: new google.maps.LatLng(12.971565, 79.159716),
        center: { lat: latitude, lng: longitude },
        // center: new google.maps.LatLng(latitude, longitude),
          zoom: 18
        });
        var infoWindow = new google.maps.InfoWindow;
        var latlng = new google.maps.LatLng(latitude, longitude);
        var myMarkerOptions = {
          position: latlng,
          map: map
        }
        var myMarker = new google.maps.Marker(myMarkerOptions);
        }
    </script>
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4Irb5-DYgI-ec7P0Sq-EMMZStN45mLfE&callback=initMap">
    </script>