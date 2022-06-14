<?php
declare(strict_types = 1);
session_start();

require_once('../database/db_loader.php');
require_once('../php/request.php');

$db = getDatabase();


if (isset($_SESSION['id'])) {
    $request = Request::getRequest($db, intval($_POST['requestID']));
    if ($_POST['req-button'] == "done") {
        if ($_POST['req-state'] != "Delivered") {
            $request->updateRequestState($db, $_POST['req-state']);
        } else {
            $request->removeRequest($db);
        }
    } else if ($_POST['req-button'] == "close") {
        $request->removeRequest($db);
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>