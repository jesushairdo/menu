<?php
require_once('include.inc.php');

$smarty = new Smarty_Menu();

if ($_SERVER['REQUEST_METHOD'] =='POST')
{
    if (array_key_exists('action', $_POST['action'))
    {
        $action = @$_POST['action'];
    }
}
else
{
    if (array_key_exists('action', $_POST['action']))
    {
        $action = @$_GET['action'];
    }
}
switch($action)
{
    case 'adminSelectorUnits':
        require_once('adminSelectorUnits.php');
        break;
    case 'adminEditUnit':
        require_once('adminEditUnit.php');
        break;
    case 'doAdminEditUnit':
        require_once('doAdminEditUnit.php');
        break;
    case 'adminAddUnit':
        require_once('adminAddUnit.php');
        break;
    case 'doAdminAddUnit':
        require_once('doAdminAddUnit.php');
        break;
    default:
        require_once('welcome.php');
        break;
}

$smarty->assign('placeholder', 'value');
//display resulting page to user
$smarty->display('fullPage.tpl.html');
?>
