<?php

include "ConnectDB.php";

// Query status OPEN
$sql = "SELECT `template_version`,count(`action`)FROM sugarcrm_hr.email_tracking WHERE template_version='Zenith2016V1' && `action`='open'
        AND (date_modified <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y-%m-%d') AND date_modified  >= DATE_SUB(DATE_FORMAT(UTC_TIMESTAMP(),'%Y-%m-%d'),INTERVAL 6 MONTH))";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {

        /*echo "OPEN = " . $row['count(`action`)'];*/

        $_SESSION['templateVersion'] = $row['template_version'];
        $_SESSION['ActionCount'] = $row['count(`action`)'];

    }
} else {
    echo "0 results";
}
// Query status Unread
$sql = "SELECT `template_version`,count(`action`)FROM sugarcrm_hr.email_tracking WHERE template_version='Zenith2016V1' && `action`='unread'
        AND (date_modified <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y-%m-%d') AND date_modified  >= DATE_SUB(DATE_FORMAT(UTC_TIMESTAMP(),'%Y-%m-%d'),INTERVAL 6 MONTH))";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {
        /*echo "Unread  = " . $row['count(`action`)'];*/

        /*$_SESSION['templateVersion'] = $row['template_version'];*/
        $_SESSION['ActionCountUnread'] = $row['count(`action`)'];

    }
} else {
    echo "0 results";
}
// Query status Repiled
$sql = "SELECT `template_version`,count(`action`)FROM sugarcrm_hr.email_tracking WHERE template_version='Zenith2016V1' && `action`='replied'
        AND (date_modified <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y-%m-%d') AND date_modified  >= DATE_SUB(DATE_FORMAT(UTC_TIMESTAMP(),'%Y-%m-%d'),INTERVAL 6 MONTH))";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {
        /*echo "Unread  = " . $row['count(`action`)'];*/

        /*$_SESSION['templateVersion'] = $row['template_version'];*/
        $_SESSION['ActionCountReplied'] = $row['count(`action`)'];

    }
} else {
    echo "0 results";
}
// Query status Click
$sql = "SELECT `template_version`,count(`action`)FROM sugarcrm_hr.email_tracking WHERE template_version='Zenith2016V1' && `action`='click'
        AND (date_modified <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y-%m-%d') AND date_modified  >= DATE_SUB(DATE_FORMAT(UTC_TIMESTAMP(),'%Y-%m-%d'),INTERVAL 6 MONTH))";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {

        /*echo "OPEN = " . $row['count(`action`)'];*/
        $_SESSION['ActionCountClick'] = $row['count(`action`)'];

    }
} else {
    echo "0 results";
}
// Calculate all of thing ------------------------------------------
$Read = $_SESSION['ActionCountClick']+$_SESSION['ActionCount'];
$Unread = $_SESSION['ActionCountUnread'];
$Replied = $_SESSION['ActionCountReplied'];
$Total = $_SESSION['ActionCountUnread'] + $_SESSION['ActionCount']+$_SESSION['ActionCountClick'] + $_SESSION['ActionCountReplied'];