<?php
    require_once("../APIClient.php");

    var_dump(APIClient::getUser(null));

    ?><br /><?php

    $item = APIClient::getUser(1);
    echo    'Username:  ' . $item->getUsername() . '<br />' .
            'Full Name: ' . $item->getFirstName() . ' ' . $item->getLastName() . '<br />' .
            'Is Admin:  ' . $item->getAdmin() . '<br />' .
            'Notify:    ' . $item->getNotify() . '<br />';
?>
