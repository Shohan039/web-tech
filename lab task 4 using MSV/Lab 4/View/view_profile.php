<!DOCTYPE html>
<html>
<head>
    <title>View Profile</title>
    <style>

        .make-it-center{
            margin: auto;
            width: 50%;
        }

        body{
            background: #eeeaea;
            margin: auto;
            width: 50%;
            border: 1px solid #3e3c3c;
            padding: 20px;

        }

        .lefterr{
            margin-left: -10%;
        }

        .required:after {
            content:"*";
            color: red;
        }
        .error{
            color: red;
        }

        /* The sidebar menu */
        .sidenav {
            height: 100%; /* Full-height: remove this if you want "auto" height */
            width: 220px; /* Set the width of the sidebar */
            position: fixed; /* Fixed Sidebar (stay in place on scroll) */
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
            left: 0;
            background-color: #111; /* Black */
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 20px;
        }

        /* The navigation menu links */
        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
        }

        /* When you mouse over the navigation links, change their color */
        .sidenav a:hover {
            color: #f1f1f1;
        }
        .text_allign{
            
        }

    </style>
</head>
<body>

<?php
session_start();
include '../Templete/nav.php';
// define variables and set to empty values
$userErr = $passErr = "";
$username = $password = "";
$errCount = 0;

include '../Controller/DataController.php';

if (isset($_SESSION['uname'])) {
    include '../Templete/sidenav.php';

    echo "<h1> Welcome Mr. ".$_SESSION['uname']."</h1>";
    echo '
    <fieldset>
    <legend> <b>Profile:</b></legend>';
    
    //$data = loadData();
    $uname = $_SESSION['uname'];
    //$name = $_GET['name'];
 //$item->Username    
 //$name =  $_GET[$item->username];
 $details = userInfo($uname);

    echo 'Name : '.$details['name'];
    echo "<br>";
    echo 'Email : '.$details['email'];
    echo "<br>";
    echo 'Username : '.$details['username'];
    echo "<br>";
    echo 'Gender : '.$details['gender'];
    echo "<br>";
    echo 'Date of Birth : '.$details['dob'];
    echo "<br>";
    
    /*
    $strJsonFileContents = file_get_contents("../data/data.json");
    // var_dump($strJsonFileContents);

    $arra = json_decode($strJsonFileContents);
    // var_dump($arra);
    foreach($arra as $item) { //foreach element in $arr
        if ($_SESSION['uname'] === $item->username){
            // match. now check pw
            echo '<img src="' . $item->ppic_abs_path . '"width="150" height="150"> <br> <br>';
            echo '<br><div> Name: '. $item->name . '</div> <br>';
            echo '<div> Email: '. $item->email . '</div> <br>';
            echo '<div> Gender: '. $item->gender . '</div> <br>';
            echo '<div> Date of Birth: '. $item->dob . '</div> <br>';
        }
    }
    */
    echo '<b><a href="../View/edit_profile.php"> Edit Profile ' . '</a></b> <br><br>';
    echo '</fieldset>';

} else{
    header('Location: ../View/login.php');
}

?>

<br>
<br>
</body>
<?php include '../Templete/footer.php';?>
</html>