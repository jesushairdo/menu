<?php
require_once('include.inc.php');

$smarty = new Smarty_Menu();
$action = '';
if ($_SERVER['REQUEST_METHOD'] =='POST')
{
    if (array_key_exists('action', $_POST))
    {
        $action = @$_POST['action'];
    }
}
else
{
    if (array_key_exists('action', $_GET))
    {
        $action = @$_GET['action'];
    }
}
print '<!-- action: '. $action . ' -->';
switch($action)
{
    case 'adminSelectorUnits':
        print '<!-- performing adminSelectorUnits -->';
        require_once('adminSelectorUnits.php');
        break;
    case 'adminEditUnit':
        print '<!-- performing adminEditUnit -->';
        require_once('adminEditUnit.php');
        break;
    case 'doAdminEditUnit':
        print '<!-- performing doAdminEditUnit -->';
        require_once('doAdminEditUnit.php');
        break;
    case 'adminAddUnit':
        print '<!-- performing adminAddUnit -->';
        require_once('adminAddUnit.php');
        break;
    case 'doAdminAddUnit':
        print '<!-- performing doAdminAddUnit -->';
        require_once('doAdminAddUnit.php');
        break;
    default:
        print '<!-- performing default -->';
        require_once('welcome.php');
        break;
}

$smarty->assign('placeholder', 'value');
//display resulting page to user
$smarty->display('fullPage.tpl.html');
?>
