<!DOCTYPE html>
<html>
<head>
    <title>Patient Form</title>
    <link rel="stylesheet" type="text/css" href="patient_form_style.css">
    <link >
</head>
<body>
<?php
   
   
   include "con_database.php";

    if (isset($_GET['ID_PATIENT'])) {
        $id = $_GET['ID_PATIENT'];

        $sql = "SELECT * FROM `patient` WHERE `ID_PATIENT` = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

           
?>
        <form action="edit_patient.php" method="post">

            <input type="hidden" name="patientid" value="<?php echo $row["ID_PATIENT"]; ?>">        

            <label for="FIRST_NAME">First Name:</label>
            <input type="text" name="FIRST_NAME" value="<?php echo $row['FIRST_NAME']; ?>">
            <br>
            <br>

            <label for="LAST_NAME">Last Name:</label>
            <input type="text" name="LAST_NAME" value="<?php echo $row['LAST_NAME']; ?>">
            <br>
            <br>

            <label for="YEAR_OF_BIRTH">Birth Date:</label>
            <input type="date" name="YEAR_OF_BIRTH" value="<?php echo $row['YEAR_OF_BIRTH']; ?>">
            <br>
            <br>

            <label for="GENDER">Gender:</label>
            <input type="text" name="GENDER" value="<?php echo $row['GENDER']; ?>">
            <br>
            <br>

            <label for="CIN">Cin:</label>
            <input type="text" name="CIN" value="<?php echo $row['CIN']; ?>">
            <br>
            <br>

            <label for="ADDRESS">Address:</label>
            <input type="text" name="ADDRESS" value="<?php echo $row['ADDRESS']; ?>">
            <br>
            <br>

            <label for="EMAIL">Email:</label>
            <input type="email" name="EMAIL" value="<?php echo $row['EMAIL']; ?>">
            <br>
            <br>

            <label for="PHONE_NUMBER">Phone Number:</label>
            <input type="text" name="PHONE_NUMBER" value="<?php echo $row['PHONE_NUMBER']; ?>">
            <br>
            <br>

            <label for="HEALTH_INSURANCE">Health Insurance:</label>
            <input type="text" name="HEALTH_INSURANCE" value="<?php echo $row['HEALTH_INSURANCE']; ?>">
            <br>
            <br>

            <label for="EMERGENCY_CONTACT">Emergency Contact:</label>
            <input type="text" name="EMERGENCY_CONTACT" value="<?php echo $row['EMERGENCY_CONTACT']; ?>">
            <br>
            <br>

            <label for="EMERGENCY_NUMBERR">Emergency Numberr:</label>
            <input type="text" name="EMERGENCY_NUMBERR" value="<?php echo $row['EMERGENCY_NUMBERR']; ?>">
            <br>
            <br>
            
            <input type="submit" name="submit_update_patient" value="Update">
        </form>
<?php
        } 
    } else {
?>
    <form action="create.php?type=patient"   method="post">

        <input type="hidden" name="type" value="patient">

        <label for="FIRST_NAME">First Name:</label>
        <br>
        <input type="text"  name="FIRST_NAME"  placeholder="First Name">
        <br>
        <br>
        
        <label for="LAST_NAME">Last Name:</label>
        <br>
        <input type="text" name="LAST_NAME" placeholder="Last Name">
        <br>
        <br>

        <label for="YEAR_OF_BIRTH">Birth Date:</label>
        <br>
        <input type="date" name="YEAR_OF_BIRTH" placeholder="birth date">
        <br>
        <br>

        <label for="GENDER">Gender:</label>
        <br>
        <input type="text" name="GENDER" placeholder="gender">
        <br>
        <br>

        <label for="CIN">Cin:</label >
        <br>
        <input type="text" name="CIN" placeholder="cin">
        <br>
        <br>

        <label for="ADDRESS">Address:</label>
        <br>
        <input type="text" name="ADDRESS" placeholder="address">
        <br>
        <br>

        <label for="EMAIL">Email:</label>
        <br>
        <input type="email" name="EMAIL" placeholder="email">
        <br>
        <br>

        <label for="PHONE_NUMBER">Phone Number:</label>
        <br>
        <input type="text" name="PHONE_NUMBER" placeholder="phone number">
        <br>
        <br>

        <label for="HEALTH_INSURANCE">Health Insurance:</label>
        <br>
        <input type="text" name="HEALTH_INSURANCE" placeholder="health insurance">
        <br>
        <br>

        <label for="EMERGENCY_CONTACT">Emergency Contact:</label>
        <br>
        <input type="text" name="EMERGENCY_CONTACT" placeholder="emergency contact">
        <br>
        <br>

        <label for="EMERGENCY_NUMBERR">Emergency Number:</label>
        <br>
        <input type="text" name="EMERGENCY_NUMBERR" placeholder="emergency number">
        <br>
        <br>
        
        <input type="submit" name="submit_create_patient" value="Submit">
    </form>
<?php
    }
?>




</body>
</html>
