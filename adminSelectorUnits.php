<?php
$smarty->assign('selectedUnit', $_POST['unitId']);
//obtain a list of units from the database
$sql = 'SELECT unitId, unitName FROM tblUnits ORDER BY unitName ASC';
$results = $db->query($sql);
foreach ($results as $row)
{
    $unitOptions[($row->unitId)] = $row->unitName;
}
$smarty->assign('unitOptions', $unitOptions);
$smarty->assign('formEditAction', 'adminEditUnit');
$smarty->assign('formAddAction', 'adminAddUnit');
$smarty->assign('contentTemplate', 'adminSelectorUnits.tpl.html');
$smarty->assign('pageContentTitle', 'Select unit to edit');
?>
