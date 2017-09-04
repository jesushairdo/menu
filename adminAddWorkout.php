<?php
$smarty->assign('formAction', 'doAdminAddWorkout');
if (array_key_exists('workoutName', $_POST))
{
    $workoutName = $_POST['workoutName'];
}
else
{
    $workoutName = '';
}
if (array_key_exists('workoutLocation', $_POST))
{
    $workoutLocation = $_POST['workoutLocation'];
}
else
{
    $workoutLocation = '';
}
if (array_key_exists('workoutReference', $_POST))
{
    $workoutReference = $_POST['workoutReference'];
}
else
{
    $workoutReference = '';
}
//$smarty->assign('unitId', $row->unitId);
$smarty->assign('workoutName', $workoutName);
$smarty->assign('workoutLocation', $workoutLocation);
$smarty->assign('workoutReference', $workoutReference);
$smarty->assign('contentTemplate', 'adminAddWorkout.tpl.html');
$smarty->assign('pageContentTitle', 'Add Workout');
?>
