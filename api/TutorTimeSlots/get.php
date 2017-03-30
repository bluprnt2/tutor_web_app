<?php
    require_once('../oauth2-server-php/src/OAuth2/Autoloader.php');
    require_once('../server.php');
    require_once('../TutorTimeSlots.php');

    if (!$server->verifyResourceRequest($global_request)) {
        $server->getResponse()->send();
        die;
    } else {
        if($POST['tutor_id'] != NULL) {
            echo json_encode(
                getTimeSlotIDs($_POST['tutor_id'], $tutorsql)
            );
        } else if($POST['timeslot_id'] != NULL) {
            echo json_encode(
                getTutorIDs($_POST['timeslot_id'], $tutorsql)
            );
        }
    }
?>