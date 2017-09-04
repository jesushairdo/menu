<?php
//add some input validation!!!
if (itemAlreadyExists($db,'tblworkouts', 'workoutName', $_POST['workoutName']))
{
    //error cannot add as already exists
    $message = 'Cannot add as workout already exists';
}
else
{
    //prepare statement to insert data
    $stmt = $db->prepare('INSERT INTO tblworkouts (workoutName, workoutLocation, workoutReference) VALUES (:workoutName,:workoutLocation,:workoutReference)');
    $stmt->bindParam(':workoutName', $workoutName);
    $stmt->bindParam(':workoutLocation', $workoutLocation);
    $stmt->bindParam(':workoutReference', $workoutReference);

    //do some clean-up of the user input before we assign here (or as part of it, don't leave as naked user input)
    $workoutName = $_POST['workoutName'];
    $workoutLocation = $_POST['workoutLocation'];
    $workoutReference = $_POST['workoutReference'];
    $stmt->execute();
    //do some error checking here to see if it did execure the query correctly

    //all good
    $message = 'Workout added Successfully';
}
//show a confirmation message
$smarty->assign('message', $message);
?>
