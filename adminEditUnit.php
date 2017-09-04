<?php
$smarty->assign('formAction', 'doAdminEditUnit');
//create prepared statement - to avoid SQL injection attack
$stmt = $db->prepare('SELECT unitId, unitName FROM tblUnits WHERE tblUnitId = ?');
//execute the statement with the value
$stmt->execute(array($_POST['unitId']));
//there can only be 1 result, so don't loop!
$row = $stmt->fetch();
//assign values to smarty
$smarty->assign('unitId', $row->unitId);
$smarty->assign('unitName', $row->unitName);
$smarty->assign('contentTemplate', 'adminEditUnit.tpl.html');
$smarty->assign('pageContentTitle', 'Edit Unit');
?>