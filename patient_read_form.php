<!DOCTYPE html>
<html>
<head>
    <title>Patient Details</title>
</head>
<body>
<?php
    include "con_database.php";

    if (isset($_GET['ID_PATIENT'])) {
        $id = $_GET['ID_PATIENT'];

        $sql = "SELECT * FROM `patient` WHERE `ID_PATIENT` = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $patientData = $result->fetch_assoc();
?>
            <h2>Patient Details</h2>
            <form>
                <div>
                    <label>First Name:</label>
                    <span><?php echo $patientData['FIRST_NAME']; ?></span>
                </div>
                <div>
                    <label>Last Name:</label>
                    <span><?php echo $patientData['LAST_NAME']; ?></span>
                </div>
                <div>
                    <label>Birth Date:</label>
                    <span><?php echo $patientData['YEAR_OF_BIRTH']; ?></span>
                </div>
                <div>
                    <label>Gender:</label>
                    <span><?php echo $patientData['GENDER']; ?></span>
                </div>
                <div>
                    <label>CIN:</label>
                    <span><?php echo $patientData['CIN']; ?></span>
                </div>
                <div>
                    <label>Address:</label>
                    <span><?php echo $patientData['ADDRESS']; ?></span>
                </div>
                <div>
                    <label>Email:</label>
                    <span><?php echo $patientData['EMAIL']; ?></span>
                </div>
                <div>
                    <label>Phone Number:</label>
                    <span><?php echo $patientData['PHONE_NUMBER']; ?></span>
                </div>
                <div>
                    <label>Health Insurance:</label>
                    <span><?php echo $patientData['HEALTH_INSURANCE']; ?></span>
                </div>
                <div>
                    <label>Emergency Contact:</label>
                    <span><?php echo $patientData['EMERGENCY_CONTACT']; ?></span>
                </div>
                <div>
                    <label>Emergency Number:</label>
                    <span><?php echo $patientData['EMERGENCY_NUMBERR']; ?></span>
                </div>

                <a class="btn btn-danger" href="patient_page.php">Back to Patient List</a>
            </form>
<?php
        }
    }
?>
</body>
</html>
