<?php
// setup constants
// location of smarty libraries
define('SMARTY_DIR','D:/home/site/wwwroot/smarty/' );
// Location of smarty folders
define('TEMPLATE_DIR', 'D:/home/site/wwwroot/templating/');

// load Smarty library
require(SMARTY_DIR.'Smarty.class.php');
//create custom class
class Smarty_Menu extends Smarty
{
   function __construct()
   {

        // Class Constructor.
        // These automatically get set with each new instance.

        parent::__construct();

        $this->setTemplateDir(TEMPLATE_DIR . 'templates/');
        $this->setCompileDir(TEMPLATE_DIR . 'templates_c/');
        $this->setConfigDir(TEMPLATE_DIR . 'configs/');
        $this->setCacheDir(TEMPLATE_DIR . 'cache/');

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('app_name', 'Menuing');
   }

}
?>
