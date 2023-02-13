<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php 
        $firstname = "";
        $firstnameErrMsg = "";

        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            function test_input($data) {
                $data = htmlspecialchars($data);
                return $data;
            }

            $firstname = test_input($_POST['firstname']);
            $email = test_input($_POST['email']);
            $gender = isset($_POST['gender']) ? test_input($_POST['gender']) : "";
            
            

            $message = "";
            if (empty($firstname)) {
                $firstnameErrMsg = "First Name is Empty";
            }
            else {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
                $firstnameErrMsg = "Only letters and spaces allowed.";
                }
            }
            
            
            
            
            if (empty($email)) {
                $message .= "Email is Empty";
                $message .= "<br>";
            }
            else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $message .= "Please correct email.";
                    $message .= "<br>";
                }
            }


            if (empty($gender)) {
                $message .= "Gender not Selected";
                $message .= "<br>";
            }
            
   

            if(isset($_POST["SSC"]) || isset($_POST["HSC"]) || isset($_POST["BSc"])|| isset($_POST["MSc"]))

            {
            
            
                if(isset($_POST["SSC"]) && isset($_POST["HSC"]) && isset($_POST["BSc"]) && isset($_POST["MSc"]))
                {
                    echo "You are selected All degree"."<br>";
                    
                }
            
                elseif(isset($_POST["SSC"]) && isset($_POST["HSC"]) && isset($_POST["BSc"]))
                {
                    echo"you are selected SSC,HSC & BSc"."<br>";
                    
                }
            
                elseif(isset($_POST["SSC"]) && isset($_POST["HSC"]) && isset($_POST["MSc"]))
                {
                    echo "you are selected SSC,HSC & MSc"."<br>";
                }
                
                elseif(isset($_POST["HSC"]) && isset($_POST["BSc"]) && isset($_POST["MSc"]))
                {
                    echo "you are selected HSC,BSc & MSc"."<br>";
                }
            
                elseif(isset($_POST["SSC"]) && isset($_POST["BSc"]) && isset($_POST["MSc"]))
                {
                    echo "you are selected SSC,BSc & MSc"."<br>";
                   
                }
            
                elseif(isset($_POST["SSC"]) && isset($_POST["HSC"]))
                {
                    echo"you are selected SSC & HSC"."<br>";
                    
                }
                elseif(isset($_POST["SSC"]) && isset($_POST["BSc"]))
                {
                    echo "you are selected SSC & BSc "."<br>";
                    
                }
                elseif(isset($_POST["SSC"]) && isset($_POST["MSc"]))
                {
                    echo"you are selected SSC & MSc "."<br>";
                    
                }
                elseif(isset($_POST["HSC"]) && isset($_POST["BSc"]))
                {
                    echo"you are selected HSC & BSc "."<br>";
                   
                }
                elseif(isset($_POST["HSC"]) && isset($_POST["MSc"]))
                {
                    echo"you are selected HSC & MSc"."<br>";
                    
                }
                elseif(isset($_POST["BSc"]) && isset($_POST["MSc"]))
                {
                    echo"you are selected BSc & MSc "."<br>";
                    
                }
              
                
            }
            else{
                echo"you are not selected Any Degree"."<br>";
                
            }
            

            if ($message === "") {
                echo "Registration Successful";
            }
            else {
                echo $message;
            }
        }
        
        <p>Blood group?</p>
  <input list="bg" name="id2">
  <datalist id="bg">
    <option value="A+">
    <option value="A-">
    <option value="B+">
    <option value="B-">
    <option value="O+">
    <option value="O-">
    <option value="AB+">
    <option value="AB-">
  </datalist><br><br>
  <input type="reset">
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
?>

</body>
</html>