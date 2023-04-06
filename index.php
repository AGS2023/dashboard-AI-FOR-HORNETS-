<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
// Connect to the database
$host = "bzmccpy2hojlgxphx4mz-mysql.services.clever-cloud.com";
$username = "umjxvz1raf0yrnar";
$password = "qW4gHdtuatg5NJkprX93";
$dbname = "bzmccpy2hojlgxphx4mz";
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}$sql = "SELECT dangers FROM users WHERE id = 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    $dangers = $row["dangers"];
  }
} else {
  echo "0 results";
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f1f1f1;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  gap: 20px;
}

.widget {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 200px;
  height: 200px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.widget:hover {
  transform: translateY(-5px);
}

.danger {
  background-color: #ff4d4d;
  color: white;
}

.liquid {
  background-color: #0077b3;
  color: white;
}

h2 {
  font-size: 30px;
  margin: 0;
  text-align: center;
  padding: 10px;
}

p {
  font-size: 50px;
  font-weight: bold;
  margin: 0;
  text-align: center;
  padding: 10px;
}

      </style>
</head>
<body>
</script>
    <div class="container">
        <h1>Welcome to Dashboard</h1>
        <div class="widget danger" id="danger-widget">
            <div>
                <h2>Dangers</h2>
                <p><?php  echo $dangers?></p>
                
            </div>
        </div>
        <div class="widget liquid" >
  <div>
    <h2>Liquid Level</h2>
    <p id="liquid-widget"></p>
  </div>
</div>

<script>
  function updateLiquidLevel() {
    var liquidLevel = Math.floor(Math.random() * 101); // generate a random number between 0 and 100
    document.getElementById("liquid-widget").textContent = liquidLevel; // set the text content of the paragraph to the random number
  }
  
  setInterval(updateLiquidLevel, 4000); // update the liquid level every 1000ms
</script>
    

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    function updateDangerValue() {
      $.ajax({
        url: "index.php", 
        method: "GET",
        success: function(response) {
          var dangerValue = $(response).find("#danger-widget p").text();
          $("#danger-widget p").text(dangerValue);
        }
      });
    }
    setInterval(updateDangerValue, 1);
  });
</script>


</html>