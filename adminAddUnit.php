<?php
$smarty->assign('formAction', 'doAdminAddUnit');
if (array_key_exists('unitName', $_POST))
{
    $unitName = $_POST['unitName'];
}
else
{
    $unitName = '';
}
//$smarty->assign('unitId', $row->unitId);
$smarty->assign('unitName', $unitName);
$smarty->assign('contentTemplate', 'adminAddUnit.tpl.html');
$smarty->assign('pageContentTitle', 'Add Unit');
?>