<html>
<head>
    <title>ThemePark Registration</title>
</head>
<body>
<?php if (isset($_GET['form_submitted'])){

    ?>
    <h2> <?php echo $_GET['name']; ?> has been submitted</h2>
    <p>Your data have been inserted as
        <?php
        echo $_GET['roll_no'] . ' ' . $_GET['name']. '  '. $_GET['email'] .'  ' .$_GET['department'].'   '.$_GET['choose_event'];

        //<?php

        $username = "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=localhost;dbname=nutec", $username, $password);
// set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

     
        $roll_no=$_GET['roll_no'];
        $name=$_GET['name'];
        $email= $_GET['email'];
        $department=$_GET['department'];
         $choose_event=$_GET['choose_event'];


        $conn->query("insert into registrations values ('$roll_no','$name','$email','$department','$choose_event')");




      ?>
    </p>

    <p>Go <a href="task3.php">back</a> to the form</p>
<?php }
else { ?>
    <h2>Nutec'21 Event Registration for FASTIANS</h2>
    <form action="task3.php" method="GET">

      Name <input type="text" name="name">  
 Roll Number<input type="text"  name="roll_no" > <br> 
Email <input type="text"  name="email" >
<head></head>  
<title>Static Dropdown List</title>  

Department :  
<select name="department" id="department"> 
   
  <option value="CS">CS</option>  
  <option value="EE">EE</option>  
 
</select>   
</body> 
<head></head>  
<title>Static Dropdown List</title>  

Chosse event :  
<select name="choose_event" id="choose_event"> 
   
  <option value="speed programming">speed programming</option>}
  <option value="gaming">gaming</option>  
  <option value="painting">painting</option>
</select>   
</body> 
        <input type="hidden" name="form_submitted" value="1" />
        <input type="submit" value="Submit">
    </form>
<?php } ?>
</body>
</html>