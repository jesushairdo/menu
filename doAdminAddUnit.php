<?php
//add some input validation!!!

//prepare statement to insert data
$stmt = $db->perpare('INSERT INTO tblUnits (unitName) VALUES (:unitName)');
$stmt->bindParam(':unitName', $unitName);

$unitName = $_POST['unitName'];
$stmt->execute();
//do some error checking here to see if it did execure the query correctly

//inserted correctly, show a confirmation message
$smarty->assign('message', 'Unit added successfully');
?>