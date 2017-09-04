<?php
// *********************
// ** setup constants **
// *********************

// *********************
// ** Setup Smarty    **
// *********************
// location of smarty libraries
define('SMARTY_DIR','D:/home/site/wwwroot/smarty/libs/' );
// Location of smarty folders
define('TEMPLATE_DIR', 'D:/home/site/wwwroot/templating/');
// load Smarty library
require(SMARTY_DIR.'Smarty.class.php');
//create custom class for smarty
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

        //$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('app_name', 'Menuing');
   }

}
// ********************
// ** Setup Database **
// ********************
$db = new PDO('sqlite:food.sqlite3');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// **********************
// ** Custom Functions **
// **********************
function idExists(&$db, $tableName, $idFieldName, $idFieldValue)
{
    return itemAlreadyExists($db, $tableName, $idFieldName, $idFieldValue);
}
function itemAlreadyExists(&$db, $tableName, $fieldName, $fieldValue)
{
    $stmt = $db->prepare('SELECT COUNT('. $fieldName .') AS count FROM '. $tableName.' WHERE '.$fieldName.' LIKE :fieldValue');
    $stmt->bindParam(':fieldValue', $fieldValue);
    $stmt->execute();
    $result = $stmt->fetch();
    if ($result->count > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function hasItemChanged(&$db, $tableName, $fieldName, $fieldValue)
{
    
}
?>
