<?php
$message = '';
//add some input validation!!!
//validate that the passed ID exists
if (!idExists($db, 'tblWorkouts', 'workoutId', $_POST['workoutId']))
{
    $message = 'ID does not exist';
}
//check to see if anything has actually changed?

//check to see if new value already exists elsewhere
elseif (itemAlreadyExists($db,'tblWorkouts', 'workoutName', $_POST['workoutName']))
{
    //error cannot add as already exists
    $message = 'Cannot add as workout already exists';
}
else
{
    //prepare statement to insert data
    $stmt = $db->prepare('UPDATE tblWorkouts SET workoutName = :workoutName, workoutLocation = :workoutLocation, workoutReference = :workoutReference WHERE workoutId = :workoutId');
    $stmt->bindParam(':workoutName', $workoutName);
    $stmt->bindParam(':workoutId', $workoutId);
    $stmt->bindParam(':workoutLocation', $workoutLocation);
    $stmt->bindParam(':workoutReference', $workoutReference);

    $workoutName = $_POST['workoutName'];
    $workoutId = $_POST['workoutId'];
    $workoutLocation = $_POST['workoutLocation'];
    $workoutReference = $_POST['workoutReference'];

    $stmt->execute();
    //do some error checking here to see if it did execure the query correctly

    //all good
    $message = 'Workout editted Successfully';
}
//show a confirmation message
$smarty->assign('message', $message);
?>
