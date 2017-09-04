<?php
$smarty->assign('formAction', 'doAdminEditWorkout');
//create prepared statement - to avoid SQL injection attack
$stmt = $db->prepare('SELECT workoutId, workoutName, workoutLocation, workoutReference FROM tblWorkouts WHERE workoutId = :workoutId');
//bind a parameter
$stmt->bindParam(':workoutId', $_POST['optionId']);
//execute the statement
$stmt->execute();
//there can only be 1 result, so don't loop!
$row = $stmt->fetch();
//assign values to smarty
$smarty->assign('workoutId', $row->workoutId);
$smarty->assign('workoutName', $row->workoutName);
$smarty->assign('workoutLocation', $row->workoutLocation);
$smarty->assign('workoutReference', $row->workoutReference);
$smarty->assign('contentTemplate', 'adminEditworkout.tpl.html');
$smarty->assign('pageContentTitle', 'Edit Workout');
?>
