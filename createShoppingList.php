<?php
//create shopping list from menus created.
// need to workout whether to choose a list of menus, or use a start date / end date, OR do i create another object that represents the full week?
//prepare the statements for the obtaining of menu information
$menuSql = 'SELECT tblMenus.meal1, tblMenus.meal2, tblMenus.meal3 FROM tblMenus WHERE tblMenus.menuId = :menuId';
$menuStmt = $db->prepare($menuSql);
$menuStmt->bindParam(':menuId', $menuId);
$menuIds[] = 1;
$menuIds[] = 2;
$unionSql = array();
//obtain the recipeIds for the menus required
foreach ($menuIds as $menuId)
{
    //for each menu run this next bit
    $menuStmt->execute();
    $menus = $menuStmt->fetch(); // can only return one, as we are searching by menuId
    //$allMenus = array();
    //$allMenus[] = $menus;
    $allRecipes[] = $menus->meal1;
    $allRecipes[] = $menus->meal2;
    $allRecipes[] = $menus->meal3;
}
//prepare the union SQL
for($i=0; $i<count($allRecipes); $i++)
{
    $unionSql[] = 'SELECT  tblRecipeIngredients.amount AS amount, tblRecipeIngredients.unitId AS unitId, tblRecipeIngredients.ingredientId FROM tblRecipeIngredients WHERE tblRecipeIngredients.RecipeId = '.$allRecipes[$i];
}
$unionSql = implode(' UNION ALL ', $unionSql);
//prepare the SQL to obtain the ingredient list for this menu
$ingredientsSql = 'SELECT SUM(IngredientList.amount) AS amount, tblUnits.unitName AS unit, tblIngredients.ingredientName AS ingredient FROM ('.$unionSql.') AS IngredientList
LEFT JOIN tblUnits ON tblUnits.unitId = IngredientList.unitId
LEFT JOIN tblIngredients ON tblIngredients.ingredientId = IngredientList.ingredientId
GROUP BY ingredient,unit';
$ingredients = $db->query($ingredientsSql)->fetchAll();
for ($k=0; $k<count($ingredients); $k++)
{
    $ingredientsList[$k]['amount'] = $ingredients[$k]->amount;
    $ingredientsList[$k]['unit'] = $ingredients[$k]->unit;
    $ingredientsList[$k]['ingredient'] = $ingredients[$k]->ingredient;
}
//create the output
print_r($ingredientsList);
$smarty->assign('ingredients', $ingredientsList);
$smarty->assign('contentTemplate', 'createShoppingList.tpl.html');
$smarty->assign('pageContentTitle', 'Your shopping list');
?>