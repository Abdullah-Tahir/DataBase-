<?php

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
?>



<html>
<head>
    <title>NUTEC'21 EVENT REGISTRATION FOR FASTIANS</title>
</head>
<body >
<?php if (isset($_GET['form_submitted'])){
//this code is executed when the form is submitted
    ?>
   

        <?php

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

        $selector= $_GET['selector'];
        $choice=$_GET['choice'];
       


       // $conn->query("insert into registeration values ('$roll_no','$name','$email','$department','$event')");

        $query_1 = $conn->prepare("select * from registrations where $selector=?");
$query_1->execute([$choice]);
$result=$query_1->fetchAll(PDO::FETCH_ASSOC);



      ?>
    </p>
    <h1 >Nutec'21 Event Record</h1>
<table>
<thead>
<tr>
<th > <h3 >Roll No &emsp;&emsp;<h3> </th>
<th><h3>Name&emsp;&emsp; <h3> </th>
<th ><h3>Email ID &emsp;&emsp; <h3></th>
<th ><h3>Department &emsp;&emsp; <h3></th>
<th ><h3>Event &emsp;&emsp;<h3>  </th>
</tr>

</thead>


<tbody>
<?php
    foreach($result as $key=>$value)
    {
        echo '<tr>
       <td>'.$value["roll_no"].'</td>
       <td>'.$value["name"].'</td>
       <td>'.$value["email"].'</td>
       <td>'.$value["department"].'</td>
       <td>'.$value["event"].'</td>



       </tr>';
    }

    ?>

</tbody>
</table>
<?php
 }
else { ?>
    <h2>NUTEC'21 EVENT REGISTRATION FOR FASTIANS</h2>
<form action="cont.php" method="GET"> 
 


<br>Cetegory Selector:

<select name="selector" id="selector">
  <option value="roll_no">roll_no</option>
  <option value="department">department </option>
  <option value="event">event</option>
  
</select>
<br>

Your Choice:   <input type="text" name="choice"><br> 


<input type="hidden" name="form_submitted" value="1" />
<input type="submit" value="Submit">
</form>
<?php } ?>
</body>
</html>

<html>
<head>
<title>NUTEC'21 EVENT REGISTRATION FOR FASTIANS</title>
</head>
<body>

</body>
</html>