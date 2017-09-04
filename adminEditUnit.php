<?php
$smarty->assign('formAction', 'doAdminEditUnit');
$smarty->assign('unitId', $_POST['unitId']);
$smarty->assign('unitName', 'Example Name');
$smarty->assign('contentTemplate', 'adminEditUnit.tpl.html');
$smarty->assign('pageContentTitle', 'Edit Unit');
?>