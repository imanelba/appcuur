<?php 
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: connexion_page.php");
    exit; 
}

include "con_database.php";

$sql = "SELECT * FROM rdv";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Appointement Page</title>

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

        <h2>Appointement List</h2>
        <h1><a href="appointement_form.php?type=appointement">Add Appointement</a></h1>
        <br>

       

<table class="table">

    <thead>

        <tr>

       

        <th>First Name</th>

        <th>Last Name</th>

        <th>Date</th>

        <th>Begining Time</th>

        <th>Motive</th>


    </tr>

    </thead>

    <tbody> 

        <?php
        

            if ($result && $result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                   

                    <td><?php echo $row['FIRST_NAME']; ?></td>

                    <td><?php echo $row['LAST_NAME']; ?></td>
                    
                    <td><?php echo $row['DATE']; ?></td>

                    <td><?php echo $row['BEGINING_TIME']; ?></td>

                    <td><?php echo $row['MOTIVE']; ?></td>

                    <td><a class="btn btn-success" href="update.php?rdv_id=<?php echo $row['ID_RDV']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?type=rdv&rdv_id=<?php echo $row['ID_RDV']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>