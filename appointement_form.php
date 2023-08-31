<!DOCTYPE html>
<html>
<head>
    <title>Appointment Form</title>
    <link rel="stylesheet" type="text/css" href="appmnt_form_style.css">
</head>
<body>
<?php


    include "con_database.php";

    if (isset($_GET['ID_RDV'])) {
        $id = $_GET['ID_RDV'];

        $sql = "SELECT * FROM `rdv` WHERE `ID_RDV` = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $appointmentData = $result->fetch_assoc();

            $patientId = $appointmentData['ID_PATIENT'];
            $patientInfoQuery = "SELECT FIRST_NAME, LAST_NAME FROM `patient` WHERE `ID_PATIENT` = '$patientId'";
            $patientInfoResult = $conn->query($patientInfoQuery);

            if ($patientInfoResult->num_rows === 1) {
                $patientInfo = $patientInfoResult->fetch_assoc();
                $patientFirstName = $patientInfo['FIRST_NAME'];
                $patientLastName = $patientInfo['LAST_NAME'];
            }
?>
            <form action="update.php?type=appointement&ID_RDV=<?php echo $_GET['ID_RDV']; ?>" method="post">

                <input type="hidden" name="type" value="appointement">

                <p>Patient Name : <?php echo $patientFirstName . ' ' . $patientLastName; ?></p>

                <br>

                <label for="DATE">Date:</label>
                <br>
                <input type="date" name="DATE" value="<?php echo $appointmentData['DATE']; ?>"><br>
                <br>
                <br>

                <label for="BEGINING_TIME">Begining Time:</label>
                <br>
                <input type="time" name="BEGINING_TIME" value="<?php echo $appointmentData['BEGINING_TIME']; ?>"><br>
                <br>
                <br>

                <label for="END_TIME">End Time:</label>
                <br>
                <input type="time" name="END_TIME" value="<?php echo $appointmentData['END_TIME']; ?>"><br>
                <br>
                <br>

                <label for="MOTIVE">Motive:</label>
                <br>
                <input type="text" name="MOTIVE" value="<?php echo $appointmentData['MOTIVE']; ?>"><br>
                <br>
                <br>

                <input type="submit" name="submit_update_appointement" value="Update">
            </form>
<?php
        } 
    } else {
?>
        <form action="create.php?type=appointement" method="post">
            <label for="ID_PATIENT">Patient:</label>
            <select name="ID_PATIENT" id="ID_PATIENT">
                <?php
                    $patientsQuery = "SELECT ID_PATIENT, FIRST_NAME, LAST_NAME FROM `patient`";
                    $patientsResult = $conn->query($patientsQuery);

                    while ($patient = $patientsResult->fetch_assoc()) {
                        echo '<option value="' . $patient['ID_PATIENT'] . '">' . $patient['FIRST_NAME'] . ' ' . $patient['LAST_NAME'] . '</option>';
                    }
                ?>
            </select><br>

            <input type="hidden" name="type" value="appointement">
            <br>
            
            <label for="DATE">Date:</label>
            <br>
            <input type="date" name="DATE" placeholder="Date"><br>
            <br>
            <br>

            <label for="BEGINING_TIME">Begining Time:</label>
            <br>
            <input type="time" name="BEGINING_TIME" placeholder="Begining Time"><br>
            <br>
            <br>

            <label for="END_TIME">End Time:</label>
            <br>
            <input type="time" name="END_TIME" placeholder="End Time"><br>
            <br>
            <br>

            <label for="MOTIVE">Motive:</label>
            <br>
            <input type="text" name="MOTIVE" placeholder="Motive"><br>
            <br>
            <br>

            <input type="submit" name="submit_create_appointement" value="Submit">
        </form>
<?php
    }
?>
</body>
</html>
