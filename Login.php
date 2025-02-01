
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Add a black background color to the top navigation */
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add an active class to highlight the current page */
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
  display: none;
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="/">Home</a>
  <a href="/Services/Mowing">Mowing</a>
  <a href="/Services/Snow_Shoveling">Snow Shoveling</a>
  <a href="/Services/Raking">Raking</a>
  <a  href="/Login.php">Login</a>
</div>
Welcome <?php echo $_POST["name"]; ?><br>
</style>
</head>
<body>

<head>
<title>Baker Lawn Care/Services/Mowing</title>
<head>
    <title>HTML Tutorial</title>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Style the body */
body {
  font-family: Arial;
  margin: 0;
}

/* Header/Logo Title */
.header {
  padding: 1px;
  text-align: center;
  background-image: url("https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.G-vH-BO_h61sNyEfAmFg6gHaE8%26pid%3DApi&f=1&ipt=d2c1fbd2452e26fa317ccc026c25b1e6ce9c1237bd3c13b2222942d614cb12be&ipo=images");;
  color: White;
  font-size: 30px;
}

/* Page Content */
.content {padding:20px;}

footer {
  background-color: #333;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Create two columns/boxes that floats next to each other */
pictures {
  float: right;
  width: 22;
  height: 600px; /* only for demonstration, should be removed */
  background: #ccc;
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: left;
  padding: 20px;
  width: 60%;
  background-color: #f1f1f1;
  height: 600px; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}

img.one {
    height: 30%;
    width: 85%;
    }

img.two {
    height: 30%;
    width: 85%;
    }

img.three {
    height: 30%;
    width: 85%;
    }

</style>
</head>
<body>

<div class="header">
  <h1>Login</h1>
</div>

  <section>
  <html>
<body>
<h1> <h1>
<h1> <h1>
<h1> <h1>
<h1> <h1>
<h1> <h1>
<h1> <h1>
<h1> <h1>
<h1> <h1>
<h1> <h1>
<h1> <h1>
<h1> <h1>
<h1> <h1>

<form action="welcome.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

</body>
</html>
<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'db_user', 'password', 'dropbox_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            // Successful login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo "Login successful!";
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
}
?>

<!-- HTML Login Form -->
<form action="login.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
  </section>


</div>
</body>
<footer>
  <p>Baker Lawn Care </p>
</footer>
</html>
