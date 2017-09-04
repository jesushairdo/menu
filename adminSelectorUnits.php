<?php
$smarty->assign('selectedUnit', '1');
$options = array('0'=>'option 1', '1'=>'option 2');
$smarty->assign('unitOptions', $options);
$smarty->assign('contentTemplate', 'adminSelectorUnits.tpl.html');
?>
