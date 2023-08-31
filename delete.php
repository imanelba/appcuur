<?php
include "con_database.php";

if (isset($_GET['type'])) {
    $type = $_GET['type'];

    if ($type === "patient" && isset($_GET['patien_id'])) {
        $id_pat = $_GET['patien_id']; 

        if (isset($_GET['confirm']) && $_GET['confirm'] === "true") {
            $stmt = $conn->prepare("DELETE FROM `patient` WHERE `ID_PATIENT` = ?");
            $stmt->bind_param("i", $id_pat);

            if ($stmt->execute()) {
                //echo "Patient supprimé avec succès.";
                header("Location: patient_page.php");
            } else {
                echo "Erreur lors de la suppression du patient : " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo '<script>
                    var result = confirm("Êtes-vous sûr de vouloir supprimer ce patient ?");
                    if (result) {
                        window.location.href = "delete.php?type=patient&patien_id=' . $id_pat . '&confirm=true";
                    } else {
                        window.location.href = "patient_page.php";
                    }
                  </script>';
        }

    } elseif ($type === "rdv" && isset($_GET['rdv_id'])) {
        $id_rd = $_GET['rdv_id'];

        if (isset($_GET['confirm']) && $_GET['confirm'] === "true") {
            $stmt = $conn->prepare("DELETE FROM `rdv` WHERE `ID_RDV` = ?");
            $stmt->bind_param("i", $id_rd);

            if ($stmt->execute()) {
                header("Location: appointement_page.php");
            } else {
                echo "Erreur lors de la suppression du rendez-vous : " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo '<script>
                    var result = confirm("Êtes-vous sûr de vouloir supprimer ce rendez-vous ?");
                    if (result) {
                        window.location.href = "delete.php?type=rdv&rdv_id=' . $id_rd . '&confirm=true";
                    } else {
                        window.location.href = "appointement_page.php";
                    }
                  </script>';
        }

    } elseif ($type === "consultation" && isset($_GET['consu_id'])) {
        $id_cons = $_GET['consu_id'];

        if (isset($_GET['confirm']) && $_GET['confirm'] === "true") {
            $stmt = $conn->prepare("DELETE FROM `consultation` WHERE `ID_CONSU` = ?");
            $stmt->bind_param("i", $id_cons);

            if ($stmt->execute()) {
                header("Location: consultation_page.php");
            } else {
                echo "Erreur lors de la suppression de la consultation : " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo '<script>
                    var result = confirm("Êtes-vous sûr de vouloir supprimer cette consultation ?");
                    if (result) {
                        window.location.href = "delete.php?type=consultation&consu_id=' . $id_cons . '&confirm=true";
                    } else {
                        window.location.href = "consultation_page.php";
                    }
                  </script>';
        }
    }
}

$conn->close();
?>

