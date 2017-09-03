<?php
require_once('include.inc.php');

$smarty = new Smarty_Menu();
$smarty->assign('placeholder', 'value');

$smarty->display('template.tpl');
?>
