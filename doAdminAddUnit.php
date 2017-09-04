<?php
//add some input validation!!!
if (itemAlreadyExists($db,'tblUnits', 'unitName', $_POST['unitName']))
{
    //error cannot add as already exists
    $message = 'Cannot add as unit already exists'
}
else
{
    //prepare statement to insert data
    $stmt = $db->prepare('INSERT INTO tblUnits (unitName) VALUES (:unitName)');
    $stmt->bindParam(':unitName', $unitName);

    $unitName = $_POST['unitName'];
    $stmt->execute();
    //do some error checking here to see if it did execure the query correctly

    //all good
    $message = 'Unit added Successfully';
}
//show a confirmation message
$smarty->assign('message', $message);
?>