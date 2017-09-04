<?php
require_once('include.inc.php');

$smarty = new Smarty_Menu();
//$smarty->debugging = true;
$action = '';
if ($_SERVER['REQUEST_METHOD'] =='POST')
{
    if (array_key_exists('action', $_POST))
    {
        $action = $_POST['action'];
    }
}
else
{
    if (array_key_exists('action', $_GET))
    {
        $action = $_GET['action'];
    }
}
print '<!-- action: '. $action . ' -->';
switch($action)
{
    //Units
    case 'adminSelectorUnits':
        require_once('adminSelectorUnits.php');
        break;
    case 'adminEditUnit':
        require_once('adminEditUnit.php');
        break;
    case 'doAdminEditUnit':
        require_once('doAdminEditUnit.php');
        require_once('adminDisplayMessage.php');
        break;
    case 'adminAddUnit':
        require_once('adminAddUnit.php');
        break;
    case 'doAdminAddUnit':
        require_once('doAdminAddUnit.php');
        require_once('adminDisplayMessage.php');
        break;
    //workouts
    case 'adminSelectorWorkouts':
        require_once('adminSelectorWorkouts.php');
        break;
    case 'adminEditWorkout':
        require_once('adminEditWorkout.php');
        break;
    case 'doAdminEditWorkout':
        require_once('doAdminEditWorkout.php');
        require_once('adminDisplayMessage.php');
        break;
    case 'adminAddWorkout':
        require_once('adminAddWorkout.php');
        break;
    case 'doAdminAddWorkout':
        require_once('doAdminAddWorkout.php');
        require_once('adminDisplayMessage.php');
        break;
    default:
        require_once('welcome.php');
        break;
}

$smarty->assign('placeholder', 'value');
//display resulting page to user
$smarty->display('fullPage.tpl.html');
?>
