<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
  
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
.logout{
  position: absolute;
  right:0px;

}

</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="admin.php">Add products</a>
  <a href="deliver.php">Delivered</a>
  <a href="calculate.php">Calculate</a>
  <a href="logout.php" class="logout">Logout</a>
</div>
</body>
</html>