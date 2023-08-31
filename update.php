<?php

include "con_database.php";

if (isset($_GET['type'])) {
    if ($_GET['type'] === 'appointement') {
     if (isset($_POST['submit_update_rdv'])) {
    
         $id_rd = $_GET['rdv_id'];

         $date = $_POST['DATE'];
         $begining_time = $_POST['BEGINING_TIME'];
         $end_time = $_POST['END_TIME'];
         $motive = $_POST['MOTIVE'];

         $updateQuery = "UPDATE `rdv` SET `DATE` = ?, `BEGINING_TIME` = ?, `END_TIME` = ?, `MOTIVE` = ? WHERE `ID_RDV` = ?";
         $stmt = $conn->prepare($updateQuery);
         $stmt->bind_param("ssssi", $date, $begining_time, $end_time, $motive, $id_rd);

    if ($stmt->execute()) {

        echo "Rendez-vous mis à jour avec succès.";
    } else {
        
        echo "Erreur lors de la mise à jour du rendez-vous : " . $stmt->error;
    }

    $stmt->close();
}
}
 elseif ($_GET['type'] === 'patient') {
 if (isset($_POST['submit_update_patient'])) {
   
    $id_pat = $_GET['patien_id'];

    $first_name = $_POST['FIRST_NAME'];
    $last_name = $_POST['LAST_NAME'];
    $year_of_birth = $_POST['YEAR_OF_BIRTH'];
    $gender = $_POST['GENDER'];
    $cin = $_POST['CIN'];
    $address = $_POST['ADDRESS'];
    $email = $_POST['EMAIL'];
    $phone_number = $_POST['PHONE_NUMBER'];
    $health_insurance = $_POST['HEALTH_INSURANCE'];
    $emergency_contact = $_POST['EMERGENCY_CONTACT'];
    $emergency_number = $_POST['EMERGENCY_NUMBERR'];

    //$id_utilisateur = 1;

    $updateQuery = "UPDATE `patient` SET `FIRST_NAME` = ?, `LAST_NAME` = ?, `YEAR_OF_BIRTH` = ?, `GENDER` = ?, `CIN` = ?, `ADDRESS` = ?, `EMAIL` = ?, `PHONE_NUMBER` = ?, `HEALTH_INSURANCE` = ?, `EMERGENCY_CONTACT` = ?, `EMERGENCY_NUMBERR` = ? WHERE `ID_PATIENT` = ?";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sssssssssssi", $first_name, $last_name, $year_of_birth, $gender, $cin, $address, $email, $phone_number, $health_insurance, $emergency_contact, $emergency_number, $id_pat);

    if ($stmt->execute()) {
        echo "Informations du patient mises à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour des informations du patient : " . $stmt->error;
    }

    $stmt->close();
}
}
elseif ($_GET['type'] === 'consultation') {
    if (isset($_POST['submit_update_consultation'])) {
      
       $id_cons = $_GET['consu_id'];
   
       $height = $_POST['HEIGHT'];
       $weight = $_POST['WEIGHT'];
       $age = $_POST['AGE'];     
       $blood_type = $_POST['BLOOD_TYPE'];
       $allergy = $_POST['ALLERGY'];
       $previous_diseases = $_POST['PREVIOUS_DISEASES'];
       $disease = $_POST['DISEASE'];
       $treatement = $_POST['TREATEMENT'];
       $conclusion = $_POST['CONCLUSION'];
       //$id_utilisateur = 1;
   
       $updateQuery = "UPDATE `consultation` SET `HEIGHT` = ?, `WEIGHT` = ?, `AGE` = ?, `BLOOD_TYPE` = ?, `ALLERGY` = ?, `PREVIOUS_DISEASES` = ?, `DISEASE` = ?, `TREATEMENT` = ?, `CONCLUSION` = ? WHERE `ID_CONSU` = ?";
   
       $stmt = $conn->prepare($updateQuery);
       $stmt->bind_param("sssssssssi", $height, $weight, $age, $blood_type, $allergy, $previous_diseases, $disease, $treatement, $conclusion, $id_cons);
   
       if ($stmt->execute()) {
           echo "Informations du patient mises à jour avec succès.";
       } else {
           echo "Erreur lors de la mise à jour des informations du patient : " . $stmt->error;
       }
   
       $stmt->close();
   }
   }
}

$conn->close();
?>
