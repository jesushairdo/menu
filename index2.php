<?php
require_once('include.inc.php');

$smarty = new Smarty_Menu();

if ($_SERVER['REQUEST_METHOD'] =='POST')
{
    $action = $_POST['action'];
}
else
{
    $action = $_GET['action'];
}
switch($action)
{
    case 'adminSelectorUnits':
        require_once('adminSelectorUnits.php');
        break;
    default:
        //require_once('welcome.php');
        break;
}

$smarty->assign('placeholder', 'value');
//display resulting page to user
$smarty->display('fullPage.tpl.html');
?>
