<?php

include_once 'controller.php';

 
if (isset($_POST['form_submission'])) {

    $form_submission = $_POST['form_submission'];
    switch ($form_submission) {

        case "delete_logs" :
            deleteLogs($logger, $session);
            break;
        case "delete_some_logs" :
            deleteSomeLogs($logger, $session);
            break;
        default :
            if ($session->logged_in) {
                logout($session, $configs);
            } else {
                header("Location: " . $configs->homePage());
            }
    }
} else {
    logout($session, $configs);
}

 
function deleteLogs($logger, $session) {
    
    $logger->purgeLogs();
    $logger->logAction($session->id, "DELETED ALL LOGS");
    header("Location: " . $session->referrer);
    
}

 
function deleteSomeLogs($logger, $session) {
    
    $logger->deleteLogs(30);
    $logger->logAction($session->id, "DELETED LOGS");
    header("Location: " . $session->referrer);
    
}
