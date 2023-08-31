<?php 

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

            <li><a href="deconnexion_page.php">Logout</a></li>
      
          </ul>
      </nav>
</header>
<body>

    <div class="container">
       
        <br>

        <h2>Specific appointements</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>Date</th>

        <th>Begining Time</th>

        <th>End Time</th>

        <th>Motive</th>


    </tr>

    </thead>

    <tbody> 

    <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['ID_RDV']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['DATE']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['BEGINING_TIME']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['END_TIME']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['MOTIVE']) . '</td>';
                        echo '<td><a class="btn btn-info" href="update.php?ID=' . htmlspecialchars($row['ID_RDV']) . '">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?type=rdv&ID=' . htmlspecialchars($row['ID_RDV']) . '">Delete</a></td>';
                        echo '</tr>';
                    }
                }
                ?>                
            </tbody>
        </table>
    </div>
    <?php
    if (isset($_GET['ID_PATIENT'])) {
        $id = $_GET['ID_PATIENT'];
        $sql = "SELECT * FROM `patient` WHERE `ID_PATIENT` = '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows === 1) {
            $patientData = $result->fetch_assoc();
            echo "<h2>Patient Information</h2>";
            echo "<p>First Name: " . htmlspecialchars($patientData['FIRST_NAME']) . "</p>";
            echo "<p>Last Name: " . htmlspecialchars($patientData['LAST_NAME']) . "</p>";
            $sql_rdv = "SELECT * FROM `rdv` WHERE `ID_PATIENT` = '$id'";
            $result_rdv = $conn->query($sql_rdv);
            if ($result_rdv->num_rows > 0) {
                echo "<h2>RDV List for Patient</h2>";
                echo "<ul>";
                while ($row_rdv = $result_rdv->fetch_assoc()) {
                    echo "<li>" . htmlspecialchars($row_rdv['DATE']) . " - " . htmlspecialchars($row_rdv['BEGINING_TIME']) . " - " . htmlspecialchars($row_rdv['END_TIME']) . " - " . htmlspecialchars($row_rdv['MOTIVE']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "No RDV found for this patient.";
            }
            echo '<a class="btn btn-danger" href="appointement_page.php">Back to Appointment Page</a>';
        }
    }
    ?>
</body>
</html>