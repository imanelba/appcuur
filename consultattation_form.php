<!DOCTYPE html>
<html>
<head>
    <title>Consultation Form</title>
    <link rel="stylesheet" type="text/css" href="cons_form_style.css">
</head>
<body>
<?php
   
   
   include "con_database.php";

    if (isset($_GET['ID_CONSU'])) {
        $id = $_GET['ID_CONSU'];

        $sql = "SELECT * FROM `consultation` WHERE `ID_CONSU` = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $consultationData = $result->fetch_assoc();

            $patientId = $consultationData['ID_PATIENT'];
            $patientInfoQuery = "SELECT FIRST_NAME, LAST_NAME FROM `patient` WHERE `ID_PATIENT` = '$patientId'";
            $patientInfoResult = $conn->query($patientInfoQuery);

            if ($patientInfoResult->num_rows === 1) {
                $patientInfo = $patientInfoResult->fetch_assoc();
                $patientFirstName = $patientInfo['FIRST_NAME'];
                $patientLastName = $patientInfo['LAST_NAME'];
            }

           
?>
        <form action="update.php?type=consultation&ID_CONSU=<?php echo $_GET['ID_CONSU']; ?>" method="post">

            <input type="hidden" name="type" value="consultation">  
            
            <p>Patient Name : <?php echo $patientFirstName . ' ' . $patientLastName; ?></p>
            <br>

            <label for="HEIGHT">Height:</label>
            <input type="text" name="HEIGHT" value="<?php echo $consultationData['HEIGHT']; ?>">
            <br>
            <br>

            <label for="WEIGHT">Weight:</label>
            <input type="text" name="WEIGHT" value="<?php echo $consultationData['WEIGHT']; ?>">
            <br>
            <br>

            <label for="AGE">Age:</label>
            <input type="date" name="AGE" value="<?php echo $consultationData['AGE']; ?>">
            <br>
            <br>

            <label for="BLOOD_TYPE">Blood Type:</label>
            <input type="text" name="BLOOD_TYPE" value="<?php echo $consultationData['BLOOD_TYPE']; ?>">
            <br>
            <br>

            <label for="ALLERGY">Allergy:</label>
            <input type="text" name="ALLERGY" value="<?php echo $consultationData['ALLERGY']; ?>">
            <br>
            <br>

            <label for="PREVIOUS_DISEASES">Previous Diseases:</label>
            <input type="text" name="PREVIOUS_DISEASES" value="<?php echo $consultationData['PREVIOUS_DISEASES']; ?>">
            <br>
            <br>

            <label for="DISEASE"> Disease:</label>
            <input type="text" name="DISEASE" value="<?php echo $consultationData['DISEASE']; ?>">
            <br>
            <br>

            <label for="EMAIL">Email:</label>
            <input type="email" name="EMAIL" value="<?php echo $consultationData['EMAIL']; ?>">
            <br>
            <br>

            <label for="PHONE_NUMBER">Phone Number:</label>
            <input type="text" name="PHONE_NUMBER" value="<?php echo $consultationData['PHONE_NUMBER']; ?>">
            <br>
            <br>

            <label for="CONCLUSION">CConclusion:</label>
            <input type="text" name="CONCLUSION" value="<?php echo $consultationData['CONCLUSION']; ?>">
            <br>
            <br>

            
            
            <input type="submit" name="submit_update_consultation" value="Update">
        </form>
<?php
        } 
    } else {
?>
    <form action="create.php?type=consultation"   method="post">
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


        <input type="hidden" name="type" value="consultation">
        <br>

        <label for="HEIGHT">Height:</label>
        <br>
        <input type="text" name="HEIGHT" placeholder="Height">
        <br>
        <br>

        <label for="WEIGHT">Weight:</label>
        <br>
        <input type="text" name="WEIGHT" placeholder="weight">
        <br>
        <br>

        <label for="AGE">Age:</label>
        <br>
        <input type="date" name="AGE" placeholder="age">
        <br>
        <br>

        <label for="BLOOD_TYPE">Blood Type:</label>
        <br>
        <input type="text" name="BLOOD_TYPE" placeholder="Blood Type">
        <br>
        <br>

        <label for="ALLERGY">Allergy:</label>
        <br>
        <textarea type="text" name="ALLERGY" placeholder="Allergy"></textarea>
        <br>
        <br>

        <label for="PREVIOUS_DISEASES">Previous Diseases:</label>
        <br>
        <textarea type="text" name="PREVIOUS_DISEASES" placeholder="Previous Disease"></textarea>
        <br>
        <br>

        <label for="DISEASE">Disease:</label>
        <br>
        <textarea type="email" name="DISEASE" placeholder="Disease"></textarea>
        <br>
        <br>

        <label for="TREATEMENT">Treatement:</label>
        <br>
        <textarea type="text" name="TREATEMENT" placeholder="Treatement"></textarea>
        <br>
        <br>

        <label for="CONCLUSION">Conclusion:</label>
        <br>
        <textarea type="text" name="CONCLUSION" placeholder="Conclusion"></textarea>
        <br>
        <br>

        
        
        <input type="submit" name="submit_create_consultation" value="Submit">
    </form>
<?php
    }
?>




</body>
</html>