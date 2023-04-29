A.
<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>

<!DOCTYPE html>

<html>

<head>

    <title>HOME</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>

     <a href="logout.php">Logout</a>

</body>

</html>

<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>
B.
<form method="post" action="register.php">
  <label for="username">Username:</label>
  <input type="text" name="username" required>
  <label for="password">Password:</label>
  <input type="password" name="password" required>
  <label for="email">Email:</label>
  <input type="email" name="email" required>
  <input type="submit" value="Register">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get form data
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $conn = mysqli_connect('localhost', 'username', 'password', 'database');
  $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
  mysqli_query($conn, $sql);
  mysqli_close($conn);

  // Redirect to login page
  header('Location: login.php');
  exit();
}
?>

c.


<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

     <form action="login.php" method="post">

        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>User Name</label>

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit">Login</button>

     </form>

</body>

</html>

D.

<?php 

session_start(); 

include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['user_name'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: home.php");

                exit();

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}

E.
<?php
$conn = mysqli_connect('localhost', 'username', 'password', 'database');
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo '<h1>' . $row['username'] . '</h1>';
echo '<p>Email: ' . $row['email'] . '</p>';
echo '<p>Full Name: ' . $row['full_name'] . '</p>';
mysqli_close($conn);
?>


F.
    body
  {
    background: #91a716;

    display: flex;

    justify-content: center;

    align-items: center;

    height: 100vh;

    flex-direction: column;

}

*{

    font-family: cursive;

    box-sizing: padding-box;

}

form {

    width: 1000px;

    border: 3px solid rgb(177, 142, 142);

    padding: 20px;

    background: rgb(85, 54, 54);

    border-radius: 20px;

}

h2 {

    text-align: center;

    margin-bottom: 40px;

}

input {

    display: block;

    border: 2px solid #ccc;

    width: 95%;

    padding: 10px;

    margin: 10px auto;

    border-radius: 5px;

}

label {

    color: #888;

    font-size: 18px;

    padding: 10px;

}

button {

    float: right;

    background: rgb(35, 174, 202);

    padding: 10px 15px;

    color: #fff;

    border-radius: 5px;

    margin-right: 10px;

    border: none;

}

button:hover{

    opacity: .10;

}

.error {

   background: #F2DEDE;

   color: #0c0101;

   padding: 10px;

   width: 95%;

   border-radius: 5px;

   margin: 20px auto;

}

h1 {

    text-align: center;

    color: rgb(134, 3, 3);

}

a {

    float: right;

    background: rgb(183, 225, 233);

    padding: 10px 15px;

    color: #fff;

    border-radius: 10px;

    margin-right: 10px;

    border: none;

    text-decoration: none;

}

a:hover{

    opacity: .7;

}

G.
?php 

session_start();

session_unset();

session_destroy();

header("Location: index.php");
