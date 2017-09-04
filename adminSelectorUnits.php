<?php
if (array_key_exists('unitId', $_POST))
{
    $selectedUnit = $_POST['unitId'];
}
else
{
    $selectedUnit = '';
}
$smarty->assign('selectedUnit', $selectedUnit);
//$unitOptions = '';
//obtain a list of units from the database
$sql = 'SELECT unitId, unitName FROM tblUnits ORDER BY unitName ASC';
$results = $db->query($sql)->fetchAll();
print '<!-- count results '. count($results) .' -->';
print '<!-- results '. print_r($results).' -->';
foreach ($results as $row)
{
    $unitOptions[($row->unitId)] = $row->unitName;
}
if (is_array($unitOptions) && (count($unitOptions)>0))
{
    $hasOptions = 1;
}
else
{
    $hasOptions = 0;
}
$smarty->assign('hasOptions', $hasOptions);
$smarty->assign('unitOptions', $unitOptions);
$smarty->assign('formEditAction', 'adminEditUnit');
$smarty->assign('formAddAction', 'adminAddUnit');
$smarty->assign('contentTemplate', 'adminSelectorUnits.tpl.html');
$smarty->assign('pageContentTitle', 'Select unit to edit');
?>
