<?php


include "con_database.php";

if (isset($_POST['type']) && $_POST['type'] === 'patient') {
       
           if (isset($_POST['submit_create_patient'])) {

            $id_utilisateur = 1;
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
            

            $sql = "INSERT INTO `patient` (`id_utilisateur`,`FIRST_NAME`, `LAST_NAME`, `YEAR_OF_BIRTH`, `GENDER`, `CIN`, `ADDRESS`, `EMAIL`, `PHONE_NUMBER`, `HEALTH_INSURANCE`, `EMERGENCY_CONTACT`, `EMERGENCY_NUMBERR`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssssss",$id_utilisateur, $first_name, $last_name, $year_of_birth, $gender, $cin, $address, $email, $phone_number, $health_insurance, $emergency_contact, $emergency_number);
            
            if ($stmt->execute()) {
                //echo "Nouveau patient créé avec succès.";
                header("Location: patient_page.php");
            } else {
                echo "Erreur lors de la création du patient : " . $stmt->error;
            }

            $stmt->close();
        }
     elseif (isset($_POST['type']) && $_POST['type'] === 'appointement') {
        
           if (isset($_POST['submit_create_appointement'])) {

            $id_patient= $_POST['ID_PATIENT'];
            $id_utilisateur = true;
            $date = $_POST['DATE'];
            $begining_time = $_POST['BEGINING_TIME'];
            $end_time = $_POST['END_TIME'];
            $motive = $_POST['MOTIVE'];
           


            $sql = "INSERT INTO `rdv` (`ID_PATIENT`,`ID_UTILISATEUR`,`DATE`, `BEGINING_TIME`, `END_TIME`, `MOTIVE`) VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss",$id_patient,$id_utilisateur, $date, $begining_time, $end_time, $motive);
            try {
                
            
                if ($stmt->execute()) {
                   // echo "Nouvelle rdv créée avec succès.";
                    header("Location: appointement_page.php");

                } else {
                    echo "Erreur lors de la création de la consultation.";
                }
            } catch (mysqli_sql_exception $e) {
                echo "Erreur SQL : " . $e->getMessage();
            }
            $stmt->close();
        }
    }
    elseif (isset($_POST['type']) && $_POST['type'] === 'consultation') {
        
        if (isset($_POST['submit_create_consultation'])) {
        
            $id_utilisateur = 1;
            $id_patient= $_POST['ID_PATIENT'];
            $height = $_POST['HEIGHT'];
            $weight = $_POST['WEIGHT'];
            $age = $_POST['AGE'];     
            $blood_type = $_POST['BLOOD_TYPE'];
            $allergy = $_POST['ALLERGY'];
            $previous_diseases = $_POST['PREVIOUS_DISEASES'];
            $disease = $_POST['DISEASE'];
            $treatement = $_POST['TREATEMENT'];
            $conclusion = $_POST['CONCLUSION'];

          


         $sql = "INSERT INTO `consultation` (`ID_UTILISATEUR`,`ID_PATIENT`,`HEIGHT`, `WEIGHT`, `AGE`, `BLOOD_TYPE`, `ALLERGY`, `PREVIOUS_DISEASES`, `DISEASE`, `TREATEMENT`, `CONCLUSION`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

         $stmt = $conn->prepare($sql);
         $stmt->bind_param("sssssssssss",$id_utilisateur,$id_patient, $height, $weight, $age, $blood_type,$allergy,$previous_diseases,$disease,$treatement,$conclusion);

         if ($stmt->execute()) {
             //echo "Nouvelle consultation créé avec succès.";
             header("Location: consultation_page.php");
         } else {
             echo "Erreur lors de la création de la consultation : " . $stmt->error;
         }

         $stmt->close();
        }
    }





}

$conn->close();
?>
