<?php 
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: connexion_page.php");
    exit; 
}

include "con_database.php";

 

$sql = "SELECT * FROM patient";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Patient Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="patient_style.css">

</head>

<header>
    <img class="i" src="imgg/logo.png" alt="">
      <nav>
          <ul>
             <li><a href="patient_page.php">Patient</a></li>

            <li><a href="appointement_page.php">Appointement</a></li>

            <li><a href="consultation_page.php">Consultation</a></li>

            <li><a href="deconnexion_page.php">LO</a></li>
      
          </ul>
      </nav>
</header>


<body>

    <div class="container">

        <h2>Patient list </h2>
        <h1><a href="patient_form.php?type=patient">Add Patient</a></h1>
        <br>

        <form action="patient_form.php" method="GET" class="form-inline">
    <div class="form-group">
        <label for="search">Search :</label>
        <input type="text" name="search" class="form-control" id="search" placeholder="Search...">
    </div>
    <button type="submit" class="btn btn-success">Search</button>
</form>
    <br>
    <br>




<table class="table">

    <thead>

        <tr>

       

        <th>First Name</th>

        <th>Last Name</th>

        <th>Cin</th>

        <th>Address</th>

        <th>Phone Number</th>

       

        

        

        </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                  

                    <td><?php echo $row['FIRST_NAME']; ?></td>

                    <td><?php echo $row['LAST_NAME']; ?></td>

                    <td><?php echo $row['CIN']; ?></td>

                    <td><?php echo $row['ADDRESS']; ?></td>

                    <td><?php echo $row['PHONE_NUMBER']; ?></td>

                   


                    

                    <td><a class="btn btn-success" href="update.php?patien_id=<?php echo $row['ID_PATIENT']; ?>">Edit</a>&nbsp;<a class="btn btn-primary" href="update.php?type=consultation&patien_id=<?php echo $row['ID_PATIENT']; ?>">C</a>&nbsp;<a class="btn btn-danger" href="delete.php?type=patient&patien_id=<?php echo $row['ID_PATIENT']; ?>">Delete</a</td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>