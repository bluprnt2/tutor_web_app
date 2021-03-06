<?php
    require_once('../oauth2-server-php/src/OAuth2/Autoloader.php');
    require_once('../server.php');
    require_once('../Auth.php');
    require_once('../TimeSlots.php');

    if (!$server->verifyResourceRequest($global_request)) {
        $server->getResponse()->send();
        die;
    } else {
        $userid = checkLogin($_POST['access_token'], $oauthsql);
        if($userid != NULL && checkAdmin($userid, $tutorsql)) {
            echo json_encode(
                addTimeSlot(
                    $_POST['locID'],
                    $_POST['deptID'],
                    $_POST['courseID'],
                    $_POST['startTime'],
                    $_POST['endTime'],
                    $tutorsql
                )
            );
        }
    }
?>
