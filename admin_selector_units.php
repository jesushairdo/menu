<?php
require_once('include.inc.php');
$smarty = new Smarty_Menu();

$smarty->assign('selectedUnit', '--new--');
$options = array('0'=>'option 1', '1'=>'option 2');
$smarty->assign('unitOptions', $options);
$smarty->display('admin_selector_units.tpl');
?>
