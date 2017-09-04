<?php
//set selected item
// in readyness for handling errors better!
if (array_key_exists('unitId', $_POST))
{
    $selectedOption = $_POST['optionId'];
}
else
{
    $selectedOption = '';
}
$smarty->assign('selectedOption', $selectedOption);
//obtain a list of units from the database
$sql = 'SELECT workoutId, workoutName FROM tblWorkouts ORDER BY workoutName ASC';
$results = $db->query($sql)->fetchAll();
//check to see if there will be any options to create
if (count($results)>0)
{
    $hasOptions = true;
    foreach ($results as $row)
    {
        $options[($row->workoutId)] = $row->workoutName;
    }
}
else
{
    $hasOptions = false;
    $options = '';
}
//assign values to smarty object
$smarty->assign('hasOptions', $hasOptions);
$smarty->assign('options', $options);
$smarty->assign('formEditAction', 'adminEditWorkout');
$smarty->assign('formAddAction', 'adminAddWorkout');
$smarty->assign('itemType','Workout');
$smarty->assign('contentTemplate', 'adminSelector.tpl.html');
$smarty->assign('pageContentTitle', 'Select workout to edit');
?>
