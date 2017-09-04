<?php
$smarty->assign('selectedUnit', '1');
//obtain a list of units from the database
$sql = 'SELECT unitId, unitName FROM tblUnits ORDER BY unitName ASC';
$results = $db->query($sql);
$options = '';
foreach ($results as $row)
{
    $options[($row->unitId)] = $row->unitName;
}
$smarty->assign('unitOptions', $options);
$smarty->assign('formEditAction', 'adminEditUnit');
$smarty->assign('formAddAction', 'adminAddUnit');
$smarty->assign('contentTemplate', 'adminSelectorUnits.tpl.html');
$smarty->assign('pageContentTitle', 'Select unit to edit');
?>
