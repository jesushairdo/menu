<?php
$message = '';
//add some input validation!!!
//validate that the passed ID exists
if (!idExists($db, 'tblUnits', 'unitId', $_POST['unitId']))
{
    $message = 'ID does not exist';
}
//check to see if anything has actually changed?

//check to see if new value already exists elsewhere
elseif (itemAlreadyExists($db,'tblUnits', 'unitName', $_POST['unitName']))
{
    //error cannot add as already exists
    $message = 'Cannot add as unit already exists';
}
else
{
    //prepare statement to insert data
    $stmt = $db->prepare('UPDATE tblUnits SET unitName = :unitName WHERE unitId = :unitId');
    $stmt->bindParam(':unitName', $unitName);
    $stmt->bindParam(':unitId', $unitId);

    $unitName = $_POST['unitName'];
    $stmt->execute();
    //do some error checking here to see if it did execure the query correctly

    //all good
    $message = 'Unit editted Successfully';
}
//show a confirmation message
$smarty->assign('message', $message);
?>